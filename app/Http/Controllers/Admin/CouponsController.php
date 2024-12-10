<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Coupons;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponsRequests;
use App\Models\Status;
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
        return view('admin.coupons.index', compact('listcoupons', 'listtour'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listStatus = Status::query()->get();
        $listTour = Tour::query()->get();
        return view('admin.coupons.add', compact('listStatus', 'listTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponsRequests $request)
    {
        if ($request->method('post')) {
            $params = $request->except('_token');


            Coupons::create($params);
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
        $listStatus = Status::query()->get();
        $listTour = Tour::query()->get();
        $coupons = Coupons::query()->findOrFail($id);
        return view('admin.coupons.edit', compact('listStatus', 'listTour', 'coupons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponsRequests $request, string $id)
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
    public function destroy(Request $request, string $id)
    { {

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


    public function couponStatus(Request $request, $id)
    {
        $coupon = Coupons::find($id);
        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Lỗi'], 404);
        }

        $coupon->status = $coupon->status == 0 ? 1 : 0;
        $coupon->save();

        return response()->json([
            'success' => true,
            'status' => $coupon->status
        ]);
    }
}
