<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\Location;
use App\Models\Admins\Tour;
use App\Models\Admins\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
        $listLocation = Location::query()->get();
        return view('admin.location.index', compact('listLocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listStatus = Status::query()->get();
        $listUser = User::query()->get();
        $listTour = Tour::query()->get();
        return view('admin.location.add', compact('listStatus','listUser','listTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
    
            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');
    
            // Xử lý hình ảnh đại diện
            if ($request->hasFile('image')) {
                $params['image'] = $request->file('image')->store('uploads/location', 'public');
            } else {
                $params['image'] = null;
            }
    
            // Thêm sản phẩm
            $user = Location::query()->create($params);
    
            // Lấy id sản phẩm vừa thêm để thêm được album
            $user = $user->id;
    
            return redirect()->route('location.index')->with('success', 'Thêm địa điểm thành công!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $location = Location::findOrFail($id); // Lấy thông tin của location
        return view('admin.location.details', compact('location'));  // Trả về view chi tiết
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $location = Location::query()->findOrFail($id);
        $listUser = User::query()->get();
        $listTour = Tour::query()->get();
        return view('admin.location.edit', compact('location','listUser','listTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
         if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $location = Location::findOrFail($id);
        
            // Xử lý Hình Ảnh
            if ($request->hasFile('image')) {
                // Nếu có ảnh mới, xóa ảnh cũ và lưu ảnh mới
                if ($location->image) {
                    Storage::disk('public')->delete($location->image);
                    
                }
                $params['image'] = $request->file('image')->store('uploads/location', 'public');
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $params['image'] = $location->image;
            }
        
            // Cập nhật dữ liệu
            $location->update($params);
        
            return redirect()->route('location.index')->with('success', 'Cập nhật thành công!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        //
        {
           
            if ($request->isMethod('DELETE')) {
                
                $location = Location::findOrFail($id);
    
                if ($location) {
                    
                     $location->delete();
                     
                    return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
                }
                return redirect()->route('location.index')->with('success', 'Location deleted successfully.');
            }
           
    
        }

    }
}
