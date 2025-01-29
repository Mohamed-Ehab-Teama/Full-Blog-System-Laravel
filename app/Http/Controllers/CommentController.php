<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store( StoreCommentRequest $request )
    {
        $data = $request->validated();
        Comment::create($data);
        return back()->with('CommentMadeMessage', 'Comment Made Successfully');
    }


    public function replyStore( Request $request )
    {
        // dd( $request->all() );
        $reply = $request->validate([
            'name' => 'required',
            'reply' => 'required',
            'parent_id' => 'required'
        ]);
        // dd( $reply );

        Comment::create([
            'name' => $request['name'],
            'message' => $request['reply'],
            'parent_id' => $request['parent_id'],
        ]);

        return back()->with('ReplyMadeMessage', 'Reply Made Successfully');
    }

}
