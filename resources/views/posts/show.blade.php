@extends('layouts.main')

@section('title', '| View Post')

@section('content')
	<div class="row">
		<div class="col-md-8">
			<h1>{{ $post->title }}</h1>
			<p class="lead">{{ $post->body }}</p>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url Slug:</label>
					<p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
				</dl>
				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('j/m/Y H:i', strtotime($post->created_at)) }}</p>
				</dl>
				<dl class="dl-horizontal">
					<label>Update At:</label>
					<p>{{ date('j/m/Y H:i', strtotime($post->updated_at)) }}</p>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.edit',$post->id) }}" class='btn btn-block btn-warning'><span class="glyphicon glyphicon-pencil"></span></a>
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
							{!! Form::button('<span class="glyphicon glyphicon-trash"> Delete</span>', ['class'=>'btn btn-block btn-danger', 'type'=>'submit']) !!}
						{!! Form::close() !!}
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<a href="{{ route('posts.index') }}" class='btn btn-block btn-default'><span class="glyphicon glyphicon-th-list"> Posts</span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
