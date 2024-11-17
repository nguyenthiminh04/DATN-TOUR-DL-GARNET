<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admins\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
     
      public function index()
    {
        
        $data = Comment::getAll();

        return view('admin.comment.index', compact('data'));
    }
    public function destroy(string $id)
    {
        $data = Comment::findOrFail($id);
        $data->delete(); // Xóa mềm
        return redirect()->route('comment')->with('success', 'Bình luận đã được xóa!');
    }

    public function toggleStatus(Request $request, $id)
{
    $comment = Comment::findOrFail($id);
    $comment->status = !$comment->status; 
    $comment->save();

    return response()->json([
        'success' => true,
        'status' => $comment->status
    ]);
}

        
}
