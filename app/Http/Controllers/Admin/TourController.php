<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Models\Admins\UserModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\TourRequest;
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
        $title ="Danh Mục User";

        $listtour = Tour::orderBYDesc('id')->get();
        $listuser = UserModel::query()->get();
        $listlocation = Location::query()->get();
        return view('admin.tour.index', compact('title','listtour','listuser','listlocation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listuser = UserModel::query()->get();
        $listlocation = Location::query()->get();
        $listStatus = Status::query()->get();
        return view('admin.tour.add', compact('listuser','listlocation','listStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TourRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
    
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
    
            return redirect()->route('tour.index'); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listuser = UserModel::query()->get();
        $listlocation = Location::query()->get();
        $listStatus = Status::query()->get();
        $tour = Tour::query()->findOrFail($id);
        return view('admin.tour.edit', compact('listuser','listlocation','listStatus','tour'));
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
        
            // Cập nhật dữ liệu
            $tour->update($params);
        
            return redirect()->route('tour.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        {
           
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
}
