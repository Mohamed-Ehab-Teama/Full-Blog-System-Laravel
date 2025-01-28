<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['name', 'email', 'subject', 'message', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
