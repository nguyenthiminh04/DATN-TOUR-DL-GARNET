<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\CategoryTour;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryTourRequest;
use Illuminate\Support\Str;


class CategoryTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = $request->get('status');

        $query = CategoryTour::query();

        if ($status !== null) {
            $query->where('status', $status);
        }

        $listCategoryTour = $query->get();

        if ($request->ajax()) {

            return response()->json([
                'data' => $listCategoryTour
            ]);
        }


        return view('admin.categorytour.index', compact('listCategoryTour'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $listStatus = Status::query()->get();
        $listCategoryTour = CategoryTour::query()->get();
        return view('admin.categorytour.add', compact('listCategoryTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryTourRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            // dd($request);
            if (empty($params['slug'])) {
                $params['slug'] = Str::slug($params['category_tour']); // Chuyển đổi category_tour thành slug nếu không có
            }

            // Lấy trực tiếp giá trị từ dropdown
            // Thêm sản phẩm
            $categorytour = CategoryTour::query()->create($params);
            return redirect()->route('categorytour.index')->with('success', 'Thêm thành công!');
        }
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categorytour = CategoryTour::findOrFail($id); // Lấy thông tin của location
        return view('admin.categorytour.details', compact('categorytour'));  // Trả về view chi tiết
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Lấy thông tin categorytour theo ID
        $categorytour = CategoryTour::findOrFail($id);

        // Truyền dữ liệu vào view
        return view('admin.categorytour.edit', compact('categorytour'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy thông tin danh mục cần cập nhật
        $categorytour = CategoryTour::findOrFail($id);

        // Lấy các tham số từ request, ngoại trừ `_token` và `_method`
        $params = $request->except('_token', '_method');


        $categorytour->update($params);

        return redirect()->route('categorytour.index')->with('success', 'Cập nhật thành công!');;
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm CategoryTour cần xóa
        $categoryTour = CategoryTour::findOrFail($id);

        // Xóa dữ liệu
        $categoryTour->delete();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('categorytour.index')->with('success', 'Xóa danh mục Tour thành công!');
    }

    public function categorytourStatus(Request $request, $id)
    {
        $categorytour = CategoryTour::find($id);
        if (!$categorytour) {
            return response()->json(['success' => false, 'message' => 'Lỗi'], 404);
        }

        $categorytour->status = $categorytour->status == 0 ? 1 : 0;
        $categorytour->save();

        return response()->json([
            'success' => true,
            'status' => $categorytour->status
        ]);
    }
}
