<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

use App\Http\Traits\ApiTrait;

class BlogController extends Controller
{
    use ApiTrait;

    public function index(){
    	$blogs = Blog::all();
    	return view('blog.index', compact('blogs'));
    }

    public function create(){
    	return view('blog.create');
    }
    public function store(){
    	$data = request()->all();
    	$this->validate(request(), [
    		'title' => 'required|min:5',
    		'content' => 'required'
		]);
    	Blog::create($data);

    	return redirect()->route('blogs.index');
    }

    public function edit($id){
        $blog = Blog::find($id);
    	return view('blog.edit', compact('blog'));
    }

    public function update(){
        $id = request()->get('id');
        $blog = Blog::find($id);
        $data = request()->all();
        $this->validate(request(), [
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $blog->update($data);
    }

    public function show($id){
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    
}