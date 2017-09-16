@extends('layouts.default')

@section('content-header')
Blogs
@endsection

@section('content')

<div ng-controller="BlogListController">
	<div class="row">
		<div class="col-xs-3">
			<select ng-model="per_page"/>
				<option value="2">2</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>
		</div>
	</div>
	<table class="table table-striped table-hover">
		<tr>
			<th><a href="javascript:void(0);" ng-click="order('title')">Title <i  ng-if="field == 'title'" class="fa" ng-class="{'fa-sort-asc':isReverse, 'fa-sort-desc':!isReverse}"></i></a></th>
			<th><a href="javascript:void(0);" ng-click="order('content')">Content <i ng-if="field == 'content'" class="fa" ng-class="{'fa-sort-asc':isReverse, 'fa-sort-desc':!isReverse}"></i></a></th>
			<th><a href="javascript:void(0);" ng-click="order('created_at')">Created <i ng-if="field == 'created_at'" class="fa" ng-class="{'fa-sort-asc':isReverse, 'fa-sort-desc':!isReverse}"></i></a></th>
			<th>Action</th>
		</tr>
		<tr ng-repeat="record in records | orderBy : field :isReverse">
			<td>@{{ record.title }}</td>
			<td>@{{ record.content }}</td>
			<td>@{{ record.created_at }}</td>
			<td>
				<a href="#" class="btn btn-default" data-toggle="modal" data-target="#gridSystemModal">
					<i class="fa fa-eye"></i>
				</a>
				<a href="#" class="btn btn-default">
					<i class="fa fa-pencil"></i>
				</a>
				<a href="#" class="btn btn-default">
					<i class="fa fa-trash"></i>
				</a>
			</td>
		</tr>
		<tfoot>
			<tr>
				<td>
					<ul class="pagination pagination-sm inline">

	                  <li>
						  <a ng-click="page(current_page-1)" href="javascript:void(0);">«</a>
					  </li>

	                  <li ng-class="{'active': current_page == item.value}" ng-repeat="item in paginateArray">
						<a ng-click="page(item.value)" href="javascript:void(0);">
							<span ng-bind="item.value"></span>
						</a>
					  </li>

	                  <li>
						  <a ng-click="page(current_page+1)" href="javascript:void(0);">»</a>
					  </li>

	                </ul>
				</td>
			</tr>
		</tfoot>
	</table>
	<div class="row">
		<div class="col-xs-3">
			<span ng-hide="true" ng-bind="total"></span>
		</div>
		<div class="col-xs-3">
			total_pages: @{{ total_pages }}, total: @{{ total }}
		</div>
	</div>

	<pre>
		total : @{{ total }}
		total pages : @{{ total_pages }}
	</pre>



<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">
        	Modal title
    	</h4>
      </div>
      <div class="modal-body">
        content
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>

<table class="table hidden">
	@foreach($blogs as $i=>$blog)
	<tr>
		<td>{{ $i+1 }}</td>
		<td>{{ $blog->title }}</td>
		<td>
			<a href="{{ route('blogs.destroy', $blog->id) }}" class="btn btn-default">
				<i class="fa fa-eye"></i></a>
			<a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-default">
				<i class="fa fa-pencil"></i></a>
			<a id="blog-{{ $blog->id }}" href="{{ route('blogs.destroy', $blog->id) }}" class="btn btn-default">
				<i class="fa fa-trash"></i></a>
		</td>
	</tr>
	@endforeach
</table>
@endsection


@section('scripts')
<script src="{{ asset('js/ng/controllers/blogListCtrl.js') }}"></script>
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