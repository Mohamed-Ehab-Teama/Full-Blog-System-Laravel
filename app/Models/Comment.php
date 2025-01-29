<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['name', 'email', 'subject', 'message', 'blog_id', 'parent_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id','id')->with('replies'); // Recursive
    }
    

}
