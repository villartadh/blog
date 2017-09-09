<?php

namespace App\Http\Traits;

use App\Blog;

Trait ApiTrait{
	public function all(){
        $limit = request()->has('limit') ? request()->get('limit') : 2;
        return Blog::paginate($limit);
    }

    public function getBlog($id){
    	return Blog::find($id);
    }
}