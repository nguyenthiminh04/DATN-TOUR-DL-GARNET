<?php

namespace App\Http\Controllers\Admin;

use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    public $location;

    public function __construct()
    {
        $this->location = new Location();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locations = Location::paginate(10);
        $title = "Danh sách địa điểm";
    
        // Khởi tạo biến status
        $status = [
            0 => 'Hoạt động',
            1 => 'Ngừng hoạt động'
        ];
    
        return view('admin.location.index', compact('title', 'locations', 'status'));
    }
    

    public function create()
    {
        $title = "Thêm địa điểm";
        return view('admin.location.create', compact('title'));
    }

 // LocationController.php
 public function store(Request $request)
 {
     // Xác thực dữ liệu
     $request->validate([
         'name' => 'required|string|max:200',
         'description' => 'required|string|max:255',
         'content' => 'required|string|max:255',
         'status' => 'required|integer|in:0,1', // 0 và 1 là các giá trị hợp lệ
         'image' => 'nullable|image|max:2048', // Nếu có hình ảnh, giới hạn dung lượng là 2MB
     ]);
 
     // Lấy tất cả dữ liệu, ngoại trừ `_token`
     $params = $request->except('_token');
 
     // Tạo slug từ name
     $params['slug'] = Str::slug($request->input('name'));
 
     // Nếu có hình ảnh
     if ($request->hasFile('image')) {
         $params['image'] = $request->file('image')->store('uploads/location', 'public');
     }
 
     // Tạo mới location
     Location::create($params);
 
     return redirect()->route('location.index')->with('success', 'Thêm địa điểm thành công!');
 }
 


    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $location = Location::findOrFail($id);
    //     return view('admin.location.show', compact('location'));
    // }

    public function show($id) {
        $location = Location::find($id);
        return view('locations.edit', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'status' => 'required|integer',
            'image' => 'nullable|image|max:2048', // Nếu có hình ảnh
        ]);
    
        // Tìm kiếm location theo ID
        $location = Location::findOrFail($id);
    
        // Cập nhật các trường dữ liệu
        $location->name = $request->name;
        $location->description = $request->description;
        $location->content = $request->content;
        $location->status = $request->status;
    
        // Nếu có hình ảnh
        if ($request->hasFile('image')) {
            // Xử lý upload hình ảnh
            $path = $request->file('image')->store('images', 'public');
            $location->image = $path;
        }
    
        // Lưu vào cơ sở dữ liệu
        $location->save();
    
        return redirect()->route('location.index')->with('success', 'Cập nhật thành công!');
    }
    

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();
    
        return redirect()->route('location.index')->with('success', 'Địa điểm đã được xóa thành công!');
    }

    public function test()
    {
        dd("Đây là phương thức mới");
    }
}
