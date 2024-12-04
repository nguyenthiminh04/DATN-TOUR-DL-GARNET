<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admins\Category;
use App\Models\Admins\User;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listCategory = Category::query()->get();
        return view('admin.category.index', compact('listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Truyền danh sách cha cho view để hiển thị trong form
        $listUser = User::query()->get();
        $parents = Category::all();
        return view('admin.category.add', compact('parents', 'listUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');

            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');

            // Xử lý hình ảnh đại diện
            if ($request->hasFile('banner')) {
                $params['banner'] = $request->file('banner')->store('uploads/location', 'public');
            } else {
                $params['banner'] = null;
            }
            if ($request->hasFile('avatar')) {
                $params['avatar'] = $request->file('avatar')->store('uploads/location', 'public');
            } else {
                $params['avatar'] = null;
            }
            // Nếu không có giá trị hot trong request, mặc định là 0 (không hot)
            $params['hot'] = $request->has('hot') ? 1 : 0;
            // Thêm sản phẩm
            $user = Category::query()->create($params);

            // Lấy id sản phẩm vừa thêm để thêm được album
            $user = $user->id;

            return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công!');;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::findOrFail($id);
        return view('admin.category.details', compact('category')); // Trả về view chi tiết tour
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Lấy thông tin danh mục cần chỉnh sửa
        $category = Category::findOrFail($id);

        // Truyền danh sách cha và thông tin người dùng để hiển thị trong form
        $parents = Category::where('id', '!=', $id)->get(); // Không cho phép chọn chính nó làm cha
        $listUser = User::query()->get();

        return view('admin.category.edit', compact('category', 'parents', 'listUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Lấy thông tin danh mục cần cập nhật
        $category = Category::findOrFail($id);

        // Lấy các tham số từ request, ngoại trừ `_token` và `_method`
        $params = $request->except('_token', '_method');

        // Cập nhật hình ảnh nếu có
        if ($request->hasFile('banner')) {
            $params['banner'] = $request->file('banner')->store('uploads/location', 'public');
        }

        if ($request->hasFile('avatar')) {
            $params['avatar'] = $request->file('avatar')->store('uploads/location', 'public');
        }

        // Xử lý trường `hot`
        $params['hot'] = $request->has('hot') ? 1 : 0;

        // Cập nhật danh mục
        $category->update($params);

        return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Tìm và xóa danh mục
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Xóa danh mục thành công!');
    }
}
