<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Guide/
    public function index()
    {
        $activeGuides = Guide::all();
        // dd($activeGuides);
        return view('admin.guide.index', compact('activeGuides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: 'admin.guide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:guides,email',
            'phone_number'  => 'required|string|max:15',
            'address'       => 'required|string|max:255',
            'experience'    => 'required|string|max:1000',
            'skills'        => 'required|string|max:1000',
            'status'        => 'required|in:active,inactive',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string'   => 'Tên phải là chuỗi ký tự.',
            'name.max'      => 'Tên không được vượt quá 255 ký tự.',
        

            'email.required' => 'Vui lòng nhập email.',
            'email.email'    => 'Email không đúng định dạng.',
            'email.unique'   => 'Email đã được sử dụng.',

            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.string'   => 'Số điện thoại phải là chuỗi ký tự.',
            'phone_number.max'      => 'Số điện thoại không được vượt quá 15 ký tự.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string'   => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max'      => 'Địa chỉ không được vượt quá 255 ký tự.',
            'experience.required' => 'Vui lòng nhập kinh nghiệm.',
            'experience.string'   => 'Kinh nghiệm phải là chuỗi ký tự.',
            'experience.max'      => 'Kinh nghiệm không được vượt quá 1000 ký tự.',
            'skills.required' => 'Vui lòng nhập kỹ năng.',
            'skills.string'   => 'Kỹ năng phải là chuỗi ký tự.',
            'skills.max'      => 'Kỹ năng không được vượt quá 1000 ký tự.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in'       => 'Trạng thái chỉ được chọn là active hoặc inactive.',
        ]);
        
        Guide::create($validatedData);
        return redirect()->route('guide.index')->with('success', 'Thêm mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailGuide = Guide::withCount('tours')->findOrFail($id);
        $guidesTour = Guide::withCount('tours')->get();
        return view('admin.guide.detail', compact('detailGuide')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Guide::findOrFail($id);
        
        // Truyền dữ liệu vào view
        return view('admin.guide.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email',
            'phone_number'  => 'required|string|max:15',
            'address'       => 'required|string|max:255',
            'experience'    => 'required|string|max:1000',
            'skills'        => 'required|string|max:1000',
            'status'        => 'required|in:active,inactive',
        ], [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string'   => 'Tên phải là chuỗi ký tự.',
            'name.max'      => 'Tên không được vượt quá 255 ký tự.',
        

            'email.required' => 'Vui lòng nhập email.',
            'email.email'    => 'Email không đúng định dạng.',
            'email.unique'   => 'Email đã được sử dụng.',

            'phone_number.required' => 'Vui lòng nhập số điện thoại.',
            'phone_number.string'   => 'Số điện thoại phải là chuỗi ký tự.',
            'phone_number.max'      => 'Số điện thoại không được vượt quá 15 ký tự.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'address.string'   => 'Địa chỉ phải là chuỗi ký tự.',
            'address.max'      => 'Địa chỉ không được vượt quá 255 ký tự.',
            'experience.required' => 'Vui lòng nhập kinh nghiệm.',
            'experience.string'   => 'Kinh nghiệm phải là chuỗi ký tự.',
            'experience.max'      => 'Kinh nghiệm không được vượt quá 1000 ký tự.',
            'skills.required' => 'Vui lòng nhập kỹ năng.',
            'skills.string'   => 'Kỹ năng phải là chuỗi ký tự.',
            'skills.max'      => 'Kỹ năng không được vượt quá 1000 ký tự.',
            'status.required' => 'Vui lòng chọn trạng thái.',
            'status.in'       => 'Trạng thái chỉ được chọn là active hoặc inactive.',
        ]);
        $guide = Guide::findOrFail($id);
        $guide->update($validatedData);
        return redirect()
            ->route('guide.index')
            ->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function guideStatus(Request $request, $id)
    {
        $Guide = Guide::find($id);
        if (!$Guide) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy người dùng'], 404);
        }

        $Guide->status = $Guide->status == 'active' ? 'inactive' : 'active';
        $Guide->save();

        return response()->json([
            'success' => true,
            'status' => $Guide->status
        ]);
    }
}
