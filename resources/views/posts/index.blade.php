@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('posts.create') }}" class='btn btn-block btn-primary btn-h1-spacing'><span class="glyphicon glyphicon-plus"></span> New Post</a>
		</div>
		<div class="col-md-12">
			<hr>
			<table class="table">
				<thead>
						<th>#</th>
						<th>Title</th>
						<th>Body</th>
						<th>Created At</th>
						<th>Action</th>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{ $post->id }}</th>
							<th>{{ $post->title }}</th>
							<th>{{ substr($post->body, 0, 50)  }}{{ strlen($post->body) > 50 ? "...":"" }}</th>
							<th>{{ date('j/m/Y', strtotime($post->created_at)) }}</th>
							<th><a href="{{ route('posts.show',$post->id) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-eye-open"></span></a> <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></a></th>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				{{ $posts->links() }}
			</div>
		</div>
	</div>

@endsection
