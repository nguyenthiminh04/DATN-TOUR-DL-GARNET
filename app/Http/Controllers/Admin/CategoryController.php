<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        // Khởi tạo giá trị cho $types nếu cần thiết
        $types = [
            1 => 'Tin tức',
            2 => 'Quảng cáo',
            3 => 'Giới thiệu',
            // Thêm các loại khác tùy theo ứng dụng của bạn
        ];

        $status = [
            1 => 'Hiện',
            0 => 'Ẩn'
        ];

        return view('admin.category.index', compact('categories', 'types', 'status'));
    }


    public function create()
    {
        $types = [
            1 => 'Tin tức',
            2 => 'Quảng cáo',
            3 => 'Giới thiệu',
            // Thêm các loại khác tùy theo ứng dụng của bạn
        ];

        $status = [
            1 => 'Ẩn',
            0 => 'Hiện'
        ];



        return view('admin.category.create', compact('status', 'types'));
    }

    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $validated = $request->validate([
            'name' => 'required|max:100',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        // Thêm slug và user_id
        $validated['slug'] = Str::slug($validated['name']);
        $validated['user_id'] = auth()->id();

        // Tạo bản ghi mới
        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Danh mục đã được lưu thành công.');
    }






    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $types = [
            'type1' => 'Tin tức',
            'type2' => 'Quảng cáo',
            'type3' => 'Giới thiệu',
            // Thêm các loại khác tùy theo ứng dụng của bạn
        ];

        $status = [
            1 => 'Ẩn',
            0 => 'Hiện'
        ];

        return view('admin.category.edit', compact('category', 'status'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $category->update($request->all());
        return redirect()->route('category.index')->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Danh mục đã được xóa thành công.');
    }
}
