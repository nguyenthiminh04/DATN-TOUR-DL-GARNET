<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Models\Admins\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
use App\Models\Admins\CategoryTour;
use App\Models\Admins\ImageTour;
use App\Models\Status;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "Danh Mục User";

        $listtour = Tour::orderBYDesc('id')->get();
        $listuser = User::query()->get();
        $listlocation = Location::query()->get();
        $listCategoryTour = CategoryTour::query()->get();
        return view('admin.tour.index', compact('title', 'listtour', 'listuser', 'listlocation', 'listCategoryTour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listuser = User::query()->get();
        $listlocation = Location::query()->get();
        $listCategoryTour = CategoryTour::query()->get();
        return view('admin.tour.add', compact('listuser', 'listlocation', 'listCategoryTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            // dd($request);

            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');

            // Xử lý hình ảnh đại diện
            if ($request->hasFile('image')) {
                $params['image'] = $request->file('image')->store('uploads/image_tour', 'public');
            } else {
                $params['image'] = null;
            }

            // Thêm sản phẩm
            $tour = Tour::query()->create($params);

            // Lấy id sản phẩm vừa thêm để thêm được album
            $tour = $tour->id;
            $tour = Tour::query()->create($params);
            //Lấy id sản phẩm vừa thêm để thêm được album 
            $tourID = $tour->id;
            //Xử lý thêm album
            if ($request->hasFile('list_hinh_anh')) {
                foreach ($request->file('list_hinh_anh') as $image) {
                    if ($image) {
                        $path = $image->store('uploads/imagetour/id_' . $tourID, 'public');
                        $tour->imagetour()->create(
                            [
                                'tour_id' => $tourID,
                                'image' => $path,
                            ]
                        );
                    }
                }
            }
            return redirect()->route('tour.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tour.details', compact('tour'));  // Tạo một partial để hiển thị chi tiết tour
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listuser = User::query()->get();
        $listlocation = Location::query()->get();
        // $listStatus = Status::query()->get();
        $listCategoryTour = CategoryTour::query()->get();
        $tour = Tour::query()->findOrFail($id);
        // return view('admin.tour.edit', compact('listuser', 'listlocation', 'listStatus', 'tour', 'listCategoryTour'));
        return view('admin.tour.edit', compact('listuser', 'listlocation', 'tour', 'listCategoryTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

            return redirect()->route('tour.index');
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
