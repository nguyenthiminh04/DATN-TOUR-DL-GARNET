<?php

namespace App\Http\Controllers\Admin;

use App\Models\Status;
use App\Models\Admins\Tour;
use App\Models\Admins\User;
use Illuminate\Http\Request;
use App\Models\LocationUpdate;
use App\Models\Admins\Location;
use App\Models\Admins\ImageTour;
use App\Http\Requests\TourRequest;
use App\Models\Admins\CategoryTour;
use App\Http\Controllers\Controller;
use App\Models\Admins\CategoryServiceModel;
use App\Models\Admins\ServiceModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view_tour'])->only(['index']);
        $this->middleware(['permission:create_tour'])->only(['create']);
        $this->middleware(['permission:store_tour'])->only(['store']);
        $this->middleware(['permission:edit_tour'])->only(['edit']);
        $this->middleware(['permission:update_tour'])->only(['update']);
        $this->middleware(['permission:destroy_tour'])->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = "Danh Sách Tour";
        $status = $request->get('status');

        $query = Tour::query();


        if ($status !== null) {
            $query->where('status', $status);
        }


        $listtour = $query->with(['categoryServices', 'services'])->orderBy('id', 'desc')->get();


        if ($request->ajax()) {
            return response()->json([
                'data' => $listtour
            ]);
        }
        // dd($listtour);

        $listuser = User::all();
        $listlocation = Location::all();
        $listCategoryTour = CategoryTour::all();


        return view('admin.tour.index', compact('title', 'listtour', 'listuser', 'listlocation', 'listCategoryTour'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Thêm Tour";
        $data['listuser'] = User::query()->get();
        $data['listlocation'] = Location::query()->get();
        $data['listCategoryTour'] = CategoryTour::query()->get();
        $data['categoryServices'] = CategoryServiceModel::where('status', 1)->get();
        $data['services'] = [];
        return view('admin.tour.add', $data);
    }


    public function getServicesByCategories(Request $request)
    {
        $categoryIds = $request->get('category_ids', []); // Nhận danh sách danh mục đã chọn

        // Lấy dịch vụ thuộc danh mục đã chọn
        $services = ServiceModel::whereIn('category_service_id', $categoryIds)
            ->where('status', 1)
            ->get();

        return response()->json(['services' => $services]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');


            if ($request->hasFile('image')) {
                $params['image'] = $request->file('image')->store('uploads/image_tour', 'public');
            } else {
                $params['image'] = null;
            }


            $tour = Tour::query()->create($params);
            $tourID = $tour->id;


            if ($request->has('category_services') && $request->has('services')) {
                $categoryServices = $request->input('category_services');
                $services = $request->input('services');


                foreach ($categoryServices as $categoryId) {

                    $category = CategoryServiceModel::find($categoryId);
                    $availableServices = $category ? $category->services->pluck('id')->toArray() : [];
                    foreach ($services as $serviceId) {
                        if (in_array($serviceId, $availableServices)) {

                            DB::table('tour_service')->insert([
                                'tour_id' => $tourID,
                                'category_service_id' => $categoryId,
                                'service_id' => $serviceId,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }
            } else {
                return redirect()->back()->with('error', 'Không có danh mục dịch vụ hoặc dịch vụ đi kèm!');
            }


            if ($request->has('locations')) {
                $locations = $request->input('locations');

                foreach ($locations as $location) {

                    DB::table('tour_locations')->insert([
                        'tour_id' => $tourID,
                        'start' => $location['start'],
                        'end' => $location['end'],
                        'description' => $location['description'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            } else {
                return redirect()->back()->with('error', 'Không có lịch trình!');
            }

            return redirect()->route('tour.index')->with('success', 'Thêm mới thành công!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Chi Tiết Tour";
        $tour = Tour::with(['categoryServices', 'services'])->findOrFail($id);
        $uniqueCategories = $tour->categoryServices->unique('id');
        $tourLocations = DB::table('tour_locations')
            ->where('tour_id', $id)
            ->get();
        return view('admin.tour.detail', compact('tour', 'uniqueCategories', 'title', 'tourLocations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa Tour";

        $listuser = User::query()->get();
        $listlocation = Location::query()->get();
        // $listStatus = Status::query()->get();
        $listCategoryTour = CategoryTour::query()->get();
        $tour = Tour::query()->findOrFail($id);
        // return view('admin.tour.edit', compact('listuser', 'listlocation', 'listStatus', 'tour', 'listCategoryTour'));
        return view('admin.tour.edit', compact('listuser', 'listlocation', 'tour', 'listCategoryTour', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TourRequest $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $tour = Tour::findOrFail($id);

            // Xử lý Hình Ảnh
            if ($request->hasFile('image')) {
                // Nếu có ảnh mới, xóa ảnh cũ và lưu ảnh mới
                if ($tour->image) {
                    Storage::disk('public')->delete($tour->image);
                }
                $params['image'] = $request->file('image')->store('uploads/image_tour', 'public');
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $params['image'] = $tour->image;
            }
            // Xử lý Album
            $currentimages = $tour->imagetour->pluck('id')->toArray();
            $arrayCombime = array_combine($currentimages, $currentimages);
            //Trường xóa ảnh
            foreach ($arrayCombime as $key => $value) {
                //Tìm kiếm id hình ảnh trong mảng hình ảnh mới đẩy lên
                //Nếu không tông tại ID thì tức là người dùng đã xóa thẻ đó
                if (!array_key_exists($key, $request->list_hinh_anh)) {
                    $imagetour = ImageTour::query()->find($key);
                    //Xóa hình ảnh đó
                    if ($imagetour &&  Storage::disk('public')->exists($imagetour->image)) {
                        Storage::disk('public')->delete($imagetour->image);
                        $imagetour->delete();
                    }
                }
            }
            //trường hợp thêm hoặc sửa
            foreach ($request->list_hinh_anh as $key => $image) {
                if (!array_key_exists($key, $arrayCombime)) {
                    if ($request->hasFile("list_hinh_anh.$key")) {
                        $path = $image->store('uploads/image_tour/id_' . $id, 'public');
                        $tour->imagetour()->create([
                            'tour_id' => $id,
                            'image' => $path,
                        ]);
                    }
                } else if (is_file($image) && $request->hasFile("list_hinh_anh.$key")) {
                    //Trường hợp thay đổi hình ảnh
                    $imagetour = ImageTour::query()->find($key);
                    if ($imagetour &&  Storage::disk('public')->exists($imagetour->image)) {
                        Storage::disk('public')->delete($imagetour->image);
                    }
                    $path = $image->store('uploads/image_tour/id_' . $id, 'public');
                    $imagetour->update([
                        'image' => $path,
                    ]);
                }
            }
            // Cập nhật dữ liệu
            $tour->update($params);

            return redirect()->route('tour.index')->with('success', 'Cập nhật thành công!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    { {

            if ($request->isMethod('DELETE')) {

                $tour = Tour::findOrFail($id);

                if ($tour) {

                    $tour->delete();

                    return redirect()->route('tour.index');
                }
                return redirect()->route('tour.index');
            }
        }
    }

    public function tourStatus(Request $request, $id)
    {
        $tour = Tour::find($id);
        if (!$tour) {
            return response()->json(['success' => false, 'message' => 'Lỗi'], 404);
        }

        $tour->status = $tour->status == 0 ? 1 : 0;
        $tour->save();

        return response()->json([
            'success' => true,
            'status' => $tour->status
        ]);
    }
}
