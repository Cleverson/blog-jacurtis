@extends('layouts.main')

@section('title', '| Edit Blog Post')

@section('content')
	<div class="row">
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		<div class="col-md-8">
			<div class="form-group">
				{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title', null, ['class'=> 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('slug', 'Slug: ') }}
				{{ Form::text('slug', null, ['class'=> 'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('body', 'Body: ') }}
				{{ Form::textarea('body', null, ['class' => 'form-control']) }}
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Create At:</dt>
					<dd>{{ date('j/m/Y H:i', strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Update At:</dt>
					<dd>{{ date('j/m/Y H:i', strtotime($post->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.show',$post->id) }}" class='btn btn-block btn-danger'><span class="glyphicon glyphicon-ok"> Cancel</span></a>
					</div>
					<div class="col-sm-6">
						{{ Form::button('<span class="glyphicon glyphicon-floppy-save"> Save Changes</span>', ['class'=>'btn btn-success', 'type'=>'submit']) }}
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>
@endsection
