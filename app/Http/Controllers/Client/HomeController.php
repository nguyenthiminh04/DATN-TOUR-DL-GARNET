<?php

namespace App\Http\Controllers\Client;

use App\Models\Admins\Tour;
use Illuminate\Http\Request;
use App\Models\Admins\Location;
use App\Http\Controllers\Controller;
use App\Models\Admins\Category;
use App\Models\Admins\CategoryTour;
// use App\Models\Admins\Categoty_tour;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $listtour = Tour::orderByDesc('id')->get();
        $Tourmoinhat = Tour::withoutTrashed()->orderBy('view', 'desc')->take(6)->get();
        $categoryes = Category::whereNull('parent_id')->with('children')->get();
        $categories = CategoryTour::with('tours')->get();
        $locations = Location::where('status', 1)
            ->whereNull('deleted_at')
            ->inRandomOrder()
            ->take(5)
            ->get();


        // Lấy thông báo
        $notifications = collect(); // Tạo một collection rỗng mặc định
        $unreadNotifications = collect(); // Thông báo chưa đọc
        $user = auth()->user();

        if ($user) {
            $notifications = Notification::query()
                ->whereHas('users', function ($q) use ($user) {
                    $q->where('user_id', $user->id); // Lấy thông báo dành riêng cho người dùng
                })
                ->where('is_active', 1) // Chỉ lấy thông báo đang hoạt động
                ->orderByDesc('created_at') // Sắp xếp thông báo mới nhất
                ->get();

            // Lấy thông báo chưa đọc
            $unreadNotifications = Notification::query()
            ->whereHas('users', function ($q) use ($user) {
                $q->where('user_id', $user->id)
                  ->where('is_read', 0); // Chỉ lấy thông báo chưa đọc
            })
            ->where('is_active', 1)
            ->orderByDesc('created_at')
            ->get();
        }


        return view('client.home', compact('Tourmoinhat', 'locations', 'categories', 'categoryes', 'notifications', 'unreadNotifications'));
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
            'category' => Category::find($tour->category_tour_id),
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
