@extends('layouts.default')

@section('content-header')
Blogs
@endsection

@section('content')
<form id="editform" class="form" onsubmit="event.preventDefault();" action="{{ route('blogs.update', $blog->id) }}" method="PUT">
{{ csrf_field() }}
	<input type="hidden" name="id" value="{{ $blog->id}}"/>
	<div class="form-group">
		<label>Title</label>
		<input name="title" class="form-control" value="{{ $blog->title}}">
		@if ($errors->has('title'))
            <span class="alert-danger help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
	</div>
	<div class="form-group">
		<label>Content</label>
		<textarea name="content" class="form-control">{{ $blog->content }}</textarea>
		@if ($errors->has('content'))
            <span class="alert-danger help-block">
                <strong>{{ $errors->first('content') }}</strong>
            </span>
        @endif
	<input type="submit" value="Submit"/>
</form>
@endsection


@section('scripts')
<script type="text/javascript">
	$('#editform').on('submit',function(event){
		var data = $('#editform').serializeArray();
		var xhr = $.ajax({
			url: '{{ route('blogs.update', $blog->id) }}',
			method: 'PUT',
			data: data
		}).then(function(res){
			document.location.href = "{{ route('blogs.index') }}";
		});
	});
	

	

</script>
@endsection