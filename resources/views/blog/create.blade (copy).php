@extends('layouts.default')

@section('content-header')
Blogs
@endsection

@section('content')
<form class="form" action="{{ route('blogs.store') }}" method="post">
{{ csrf_field() }}

	<div class="form-group">
		<label>Title</label>
		<input name="title" class="form-control">
		@if ($errors->has('title'))
            <span class="alert-danger help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" class="form-control"></textarea>
		@if ($errors->has('content'))
            <span class="alert-danger help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
	<input type="submit" value="Submit"/>
</form>
@endsection