<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title ="Danh Mục User";
        $listStatus = Status::query()->get();
        $data = Faq::query()
        ->latest('id') 
        ->with('status') // Tải mối quan hệ với bảng status
        ->get(); 
        return view('admin.faq.index', compact('title', 'data', 'listStatus'));
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
        $data = $request->validate([
            'question' => 'required|min:3',
            'answer' => 'required|min:3',
            'status_id' => 'required|min:1',
        ]);
        // dd($data);
        if ($data) {
            Faq::create($data);
            session()->flash('success', 'Thêm mới thành công.');
            // return back();
        }else{
            session()->flash('error', 'Thêm mới thất bại.');
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $check = $faq->delete();
        if ($check) {

            session()->flash('success', 'Xóa thành công.');
            return back();
        } else {
            session()->flash('error', 'Xóa thất bại.');
            return back();
        }
    }
}
