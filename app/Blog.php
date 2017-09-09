<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;

class Blog extends Model
{
    public $fillable = [
    	'title',
    	'content'
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }
}
