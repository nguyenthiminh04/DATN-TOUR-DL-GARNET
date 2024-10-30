<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Coupons;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listcoupons = Coupons::orderBYDesc('id')->get();
        $listtour = Tour::query()->get();
        return view('admins.coupons.index', compact('listcoupons','listtour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    
            
    
            // Thêm sản phẩm
            $coupons = Coupons::query()->create($params);
    
            // Lấy id sản phẩm vừa thêm để thêm được album
            $coupons = $coupons->id;
    
            return redirect()->route('coupons.index'); 
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $tour = Coupons::findOrFail($id);
            // Cập nhật dữ liệu
            $tour->update($params);
        
            return redirect()->route('coupons.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,string $id)
    {
        {
           
            if ($request->isMethod('DELETE')) {
                
                $coupons = Coupons::findOrFail($id);
    
                if ($coupons) {
                    
                     $coupons->delete();
                     
                    return redirect()->route('coupons.index');
                }
                return redirect()->route('coupons.index');
            }
           
    
        }
    }
}
