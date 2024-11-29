<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;
use App\Models\Admins\Categorys;
use App\Models\Admins\Categoty_tour;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $listtour = Tour::orderBYDesc('id')->get();

        $Tourmoinhat = Tour::orderBy('view', 'desc')->take(6)->get();
        $categoryes = Categorys::whereNull('parent_id')->with('children')->get();
        $categories = Categoty_tour::with('tours')->get();
        $locations = Location::where('status', 1)
            ->whereNull('deleted_at') // Kiểm tra chưa bị xóa mềm
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('client.home', compact('Tourmoinhat', 'locations', 'categories', 'categoryes'));
    }
    public function show($id)
    {
        $tour = Tour::findOrFail($id);

        // Lấy bình luận gốc (parent_id = null) và kèm theo các bình luận con
        $comments = Comment::where('post_id', $tour->id)
            ->whereNull('parent_id')
            ->with('children', 'user')
            ->get();

        return view('posts.show', compact('post', 'comments'));
    }

    public function detailTour($id)
    {
        // Tìm tour theo ID, nếu không tìm thấy thì trả về 404
        $tour = Tour::findOrFail($id);
    // Tăng trường view
    $tour->increment('view'); // Tăng giá trị của cột 'view' lên 1
        // Kiểm tra xem người dùng hiện tại đã đặt tour này chưa (nếu đã đăng nhập)
        $userHasBooked = false;
    
        if (auth()->check()) {
            $userId = auth()->id();
            $userHasBooked = DB::table('book_tour')
                ->where('tour_id', $id)
                ->where('user_id', $userId)
                ->exists();
        }
    
        // Chuẩn bị dữ liệu cho view
        $data = [
            'tour' => $tour,
            'category' => Categorys::find($tour->category_tour_id),
            'location' => Location::find($tour->location_id),
            'images' => $tour->images,
            'first_image' => $tour->images->first(),
            'comments' => Comment::where('tour_id', $tour->id)
                ->whereNull('parent_id')
                ->with('children.user')
                ->get(),
            'userHasBooked' => $userHasBooked, // Truyền trạng thái đặt tour
        ];
    
        // Trả về view cùng dữ liệu
        return view('client.tour.detail', $data);
    }
    
    public function storeComment(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        // Validate dữ liệu
        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'nullable|exists:comment,id', // Để trả lời bình luận
            'anonymous_name' => 'nullable|string|max:255',
        ]);

        // Tạo bình luận
        Comment::create([
            'tour_id' => $tour->id,
            'user_id' => auth()->check() ? auth()->id() : null,
            'parent_id' => $validated['parent_id'] ?? null,
            'anonymous_name' => auth()->check() ? null : $validated['anonymous_name'],
            'content' => $validated['content'],
        ]);

        return redirect()->back()->with('success', 'Bình luận đã được lưu.');
    }
}
