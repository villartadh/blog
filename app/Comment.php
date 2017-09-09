<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Blog;

class Comment extends Model
{
    public function blog()
    {
    	return $this->belongsTo(Blog::class);
    }
}
