<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admins\Article;
use App\Models\Admins\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
       $listArticle = Article::paginate(10);// Hoặc sử dụng scope nếu cần
        return view('admin.article.index', compact('listArticle'));
    }

    // Hiển thị form tạo bài viết mới
    public function create()
    {
       $listCategory = Category::all(); // Lấy tất cả danh mục
        $listUser = User::all(); // Lấy tất cả người dùng
        return view('admin.article.create', compact('listCategory', 'listUser'));
    }

    // Xử lý lưu bài viết mới
    public function store(Request $request)
    {
        //
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
    
            // Lấy trực tiếp giá trị từ dropdown
            $params['status'] = $request->input('status');
    
            // Xử lý hình ảnh đại diện
            if ($request->hasFile('image')) {
                $params['image'] = $request->file('image')->store('uploads/article', 'public');
            } else {
                $params['image'] = null;
            }
    
            // Thêm sản phẩm
            $user = Article::query()->create($params);
    
            // Lấy id sản phẩm vừa thêm để thêm được album
            $user = $user->id;
    
            return redirect()->route('article.index')->with('success', 'Thêm bài viết điểm thành công!');
        }
    }

    // Hiển thị bài viết để chỉnh sửa
    public function edit($id)
    {
        $article = Article::findOrFail($id);
       $listCategory = Category::all();
        $listUser = User::all();
        return view('admin.article.edit', compact('article', 'listCategory', 'listUser'));
    }

    // Cập nhật bài viết đã chỉnh sửa
    public function update(Request $request, string $id)
    {
        //
         if ($request->isMethod('PUT')) {
            $params = $request->except('_token', '_method');
            $article = Article::findOrFail($id);
        
            // Xử lý Hình Ảnh
            if ($request->hasFile('image')) {
                // Nếu có ảnh mới, xóa ảnh cũ và lưu ảnh mới
                if ($article->image) {
                    Storage::disk('public')->delete($article->image);
                    
                }
                $params['image'] = $request->file('image')->store('uploads/article', 'public');
            } else {
                // Nếu không có ảnh mới, giữ lại ảnh cũ
                $params['image'] = $article->image;
            }
        
            // Cập nhật dữ liệu
            session()->flash('success', 'Thêm bài viết thành công!');

            // Chuyển hướng về trang index
            return redirect()->route('article.index');
        }
    }

    public function show(string $id)
    {
        //
        $article = Article::findOrFail($id); 
    return view('admin.article.show', compact('article')); // Trả về view chi tiết tour
    }

    // public function update(Request $request, $id)
    // {
    //     // Validate dữ liệu
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'slug' => 'required|string|max:255|unique:articles,slug,' . $id,  // Chỉ kiểm tra unique khi không phải là bài viết hiện tại
    //         'description' => 'nullable|string',
    //         'content' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //         'user_id' => 'required|exists:users,id',
    //         'status' => 'required|in:0,1',
    //         'show_home' => 'nullable|boolean',
    //         'avatar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
    //     ]);

    //     // Lấy bài viết cần cập nhật
    //     $article = Article::findOrFail($id);

    //     // Lấy dữ liệu từ form
    //     $data = $request->only([
    //         'title', 'slug', 'description', 'content', 'category_id', 'user_id', 'status', 'show_home'
    //     ]);

    //     // Xử lý hình ảnh đại diện nếu có
    //     if ($request->hasFile('avatar')) {
    //         // Xóa ảnh cũ nếu có
    //         if ($article->avatar) {
    //             unlink(storage_path('app/public/' . $article->avatar));
    //         }
    //         // Lưu ảnh mới
    //         $data['avatar'] = $request->file('avatar')->store('uploads/articles', 'public');
    //     }

    //     // Cập nhật bài viết
    //     $article->update($data);

    //     return redirect()->route('article.index')->with('success', 'Bài viết đã được cập nhật!');
    // }

    // Xóa bài viết
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Bài viết đã được xóa!');
    }
}
