<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public $article;

    public function __construct()
    {
        $this->article = new Article();
    }



    public function index(Request $request)
    {
        $articles = Article::paginate(10); // Lấy danh sách bài viết
        $title = "Danh sách bài viết";

        // Lấy danh sách danh mục
        $categories = Category::with('children')->get(); // Lấy danh sách danh mục cùng với danh mục con

        // Khởi tạo biến status
        $status = [
            0 => 'Không hoạt động',
            1 => 'Hoạt động'
        ];

        return view('admin.article.index', compact('title', 'articles', 'status', 'categories'));
    }


    public function create()
    {
        $categories = Category::whereNull('deleted_at')->get();
        $actives = [
            1 => 'Ẩn',
            0 => 'Hiện'
        ];

        return view('admin.article.create', compact('categories', 'actives'));
    }



    public function store(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|max:180',
            'active' => 'required|boolean',
            'description' => 'required|string|max:255',
            'content' => 'required'
        ]);
    
        // Tạo mới bài viết
        $article = new Article();
        $article->title = $request->input('title');
        $article->active = $request->input('active');
        $article->description = $request->input('description') ?? 'Default description';
        $article->content = $request->input('content');
        // $article->user_id = auth()->id() ?? 1;
        $article->save();
    
        return redirect()->route('article.index')->with('success', 'Bài viết đã được lưu thành công!');
    }
    
    


    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.show', compact('article'));
    }


    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }


    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu
        $request->validate([
            'title' => 'required|string|max:180',
            'category_id' => 'required|exists:categories,id',
            'active' => 'required|boolean',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Tìm kiếm bài viết theo ID
        $article = Article::findOrFail($id);

        // Cập nhật các trường dữ liệu
        $article->title = $request->title;
        $article->category_id = $request->category_id;
        $article->active = $request->active;
        $article->description = $request->description;
        $article->content = $request->content;

        // Nếu có hình ảnh mới
        if ($request->hasFile('images')) {
            // Xử lý upload hình ảnh
            $path = $request->file('images')->store('uploads/articles', 'public');
            $article->avatar = $path; // Cập nhật đường dẫn hình ảnh
        }

        // Lưu vào cơ sở dữ liệu
        $article->save();

        return redirect()->route('article.index')->with('success', 'Cập nhật bài viết thành công!');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Bài viết đã được xóa thành công!');
    }


    public function test()
    {
        dd("Đây là phương thức mới");
    }
}
