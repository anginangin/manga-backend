<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::orderBy('created_at', 'DESC')->get();
        return view('pages.comment.index', compact('comments'));
    }

    public function reply(Request $request, $commentId, $mangaId)
    {
        $comment = $request->comment;

        $data = new Comment();
        $data->commenter_id = Auth::user()->id;
        $data->commenter_type = 'App\Models\User';
        $data->commentable_type = 'App\Models\Manga';
        $data->commentable_id = $mangaId;
        $data->comment = $comment;
        $data->approved = 1;
        $data->child_id = $commentId;

        if ($data->save()) {
            return redirect()->route('comment.index')->with('message', 'Berhasil Reply Comment');
        }
        return redirect()->route('comment.index')->with('error', 'Gagal Reply Comment');
    }

    public function delete($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        if ($comment->delete()) {
            return redirect()->route('comment.index')->with('message', 'Berhasil Hapus Comment');
        }
        return redirect()->route('comment.index')->with('error', 'Gagal Hapus Comment');
    }
}
