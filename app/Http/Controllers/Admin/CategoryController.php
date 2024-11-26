<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admins\Categorys;
use App\Models\Admins\UserModel;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $listCategory = Categorys::query()->get();
        return view('admin.category.index', compact('listCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // Truyền danh sách cha cho view để hiển thị trong form
        $listUser = UserModel::query()->get();
        $parents = Categorys::all();
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
            $user = Categorys::query()->create($params);

            // Lấy id sản phẩm vừa thêm để thêm được album
            $user = $user->id;

            return redirect()->route('category.index');
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
