<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $listComments = Comment::query()->where('deleted_at', '=', null)->get();
        return view('admin.comment.index', compact('listComments'));
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
        //
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
        try {
            $comment = Comment::findOrFail($id);

            $comment->deleted_at = now();
            $comment->save();

            return redirect()->route('comment.index')->with('success', 'Xóa bình luận thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi khi xóa ' . $e->getMessage());

            return response()->view('admin.errors.404', [], 404);
        }
    }




    public function commentStatus(Request $request, $id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['success' => false, 'message' => 'Lỗi'], 404);
        }

        $comment->status = $comment->status == 1 ? 0 : 1;
        $comment->save();

        return response()->json([
            'success' => true,
            'status' => $comment->status
        ]);
    }
}
