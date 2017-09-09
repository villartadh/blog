@extends('layouts.default')

@section('content-header')
Blogs
@endsection

@section('content')
	<h1>
		{{ $blog->title }}
	</h1>
	<div>
		{{ $blog->content }}
	</div>
@endsection