<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\CategoryTour;
use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Status;

class CategoryTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Lấy danh sách CategoryTour
        $listCategoryTour = CategoryTour::query()->get();
        return view('admin.categorytour.index', compact('listCategoryTour'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $listStatus = Status::query()->get();
        $listStatus = Status::query()->get();
        $listTour = Tour::all();
        return view('admin.categorytour.add', compact('listTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Hiển thị dữ liệu gửi lên
        // dd($request->all());
    
        // Validate dữ liệu
        $params['status'] = $request->input('status');
        $request->validate([
            'categorytour' => 'required|max:180',
            'price' => 'required|numeric', // Đảm bảo price là số
            'description' => 'required|string|max:255',
            'tour_id' => 'required|exists:tours,id', // Kiểm tra tour_id có tồn tại trong bảng tours
        ]);
    
        // Kiểm tra nếu tour_id có giá trị hợp lệ
        if (is_null($request->input('tour_id'))) {
            return back()->withErrors(['tour_id' => 'Tour không hợp lệ!']);
        }
    
        // Tạo mới đối tượng CategoryTour
        $categoryTour = new CategoryTour();
        $categoryTour->categorytour = $request->input('categorytour');
        $categoryTour->price = $request->input('price');
        $categoryTour->description = $request->input('description');
        $categoryTour->tour_id = $request->input('tour_id'); // Liên kết với tour
    
        // Lưu vào database
        $categoryTour->save();
    
        // Chuyển hướng với thông báo thành công
        return redirect()->route('categorytour.index')->with('success', 'Thêm danh mục Tour thành công!');
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
    public function edit(string $id)
    {
    // Tìm CategoryTour theo ID
    $listStatus = Status::query()->get();
    $categoryTour = CategoryTour::findOrFail($id);
    
    // Lấy danh sách các tour để hiển thị trong dropdown
    $listTour = Tour::all();
    
    // Trả về view và truyền dữ liệu
    return view('admin.categorytour.edit', compact('categoryTour', 'listTour'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate dữ liệu
        $request->validate([
            'categorytour' => 'required|max:180',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'status' => 'required',
            'tour_id' => 'required|exists:tours,id',
        ]);
        
        // Tìm CategoryTour cần cập nhật
        $categoryTour = CategoryTour::findOrFail($id);
        
        // Cập nhật các trường dữ liệu
        $categoryTour->categorytour = $request->input('categorytour');
        $categoryTour->price = $request->input('price');
        $categoryTour->description = $request->input('description');
        $categoryTour->status = $request->input('status');
        $categoryTour->tour_id = $request->input('tour_id');
        
        // Lưu thay đổi vào database
        $categoryTour->save();
        
        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('categorytour.index')->with('success', 'Cập nhật danh mục Tour thành công!');
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
    
}
