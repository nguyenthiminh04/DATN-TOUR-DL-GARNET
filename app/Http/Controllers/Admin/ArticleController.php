<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\Article;
use App\Models\Admins\Category;
use App\Models\Admins\User;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $title = "Danh Mục User";
        $listUser = User::query()->get();
        $listCategory = Category::query()->get();
        $listArticle = Article::query()->get();
        return view('admin.article.index', compact('title', 'listArticle', 'listCategory', 'listUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $listCategory = Category::all(); // Lấy tất cả danh mục
        $listUser = User::query()->get();
        return view('admin.article.create', compact('listUser', 'listCategory'));
    }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    //     if ($request->isMethod('POST')) {
    //         $params = $request->except('_token');

    //         // Lấy trực tiếp giá trị từ dropdown
    //         $params['status'] = $request->input('status');

    //         // Xử lý hình ảnh đại diện
    //         $params['img_thumb'] = $request->file('img_thumb') 
    //         ? $request->file('img_thumb')->store('uploads/thumbnails', 'public') 
    //         : 'default-thumbnail.jpg'; // or set null if the column is nullable

    //         // Thêm sản phẩm
    //         $user = Article::query()->create($params);

    //         // Lấy id sản phẩm vừa thêm để thêm được album
    //         $user = $user->id;

    //         return redirect()->route('article.index')->with('success', 'Thêm bài viết thành công!');
    //     }
    // }
    public function store(ArticleRequest $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            // dd($request);

            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');

            // Xử lý hình ảnh đại diện
            if ($request->hasFile('img_thumb')) {
                $params['img_thumb'] = $request->file('img_thumb')->store('uploads/thumbnails', 'public');
            } else {
                $params['img_thumb'] = null;
            }

            // Thêm sản phẩm
            $article = Article::query()->create($params);

            // Lấy id sản phẩm vừa thêm để thêm được album
            $article = $article->id;
            $article = Article::query()->create($params);
            //Lấy id sản phẩm vừa thêm để thêm được album 
            //Xử lý thêm album
       
            return redirect()->route('article.index');
        }
    }

    /**
     * Display the specified resource.
     */
    
    public function show($id)
    {
        $article = Article::findOrFail($id); // Lấy thông tin của location
        return view('admin.article.details', compact('article'));  // Trả về view chi tiết
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $article = Article::query()->findOrFail($id);
        $listCategory = Category::all();
        $listUser = User::query()->get();
        return view('admin.article.edit', compact('article', 'listCategory', 'listUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $article = Article::findOrFail($id);

            // Xử lý Hình Ảnh
            $params['img_thumb'] = $request->file('img_thumb')
                ? $request->file('img_thumb')->store('uploads/thumbnails', 'public')
                : 'default-thumbnail.jpg'; // or set null if the column is nullable


            // Cập nhật dữ liệu
            $article->update($params);

            return redirect()->route('article.index')->with('success', 'Cập nhật thành công!');;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        {

            if ($request->isMethod('DELETE')) {

                $article = Article::findOrFail($id);

                if ($article) {

                    $article->delete();

                    return redirect()->route('article.index')->with('success', 'Xóa bài viết thành công.');
                }
                return redirect()->route('article.index')->with('success', 'Xóa bài viết thành công.');
            }
        }
    }
}
