@extends('layouts.main')

@section('title', '| create new post')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="form-signin-heading">Create New Post</h2>
			<hr>
			{!! Form::open(['route' => 'posts.store','data-parsley-validate']) !!}

				<div class="form-group">
					{{ Form::label('title', 'Title:') }}
					{{ Form::text('title', null,['class' => 'form-control', 'required' => '', 'maxlength' => '255']) }}
				</div>

				<div class="form-group">
					{{ Form::label('slug', 'slug:') }}
					{{ Form::text('slug', null,['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255']) }}
				</div>

				<div class="form-group">
					{{ Form::label('category_id', 'Category:') }}
					<select name="category_id" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{{ Form::label('body', 'Body:') }}
					{{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '','minlength' => '5', 'maxlength' => '255']) }}
				</div>

				<div class="input-group-btn">
					{{ Form::submit('Create Post', ['class' => 'btn btn-success btn-block']) }}
				</div>

			{!! Form::close() !!}

		</div>
	</div>

	@section('scripts')
		{!! Html::script('js/parsley.min.js') !!}
	@endsection

@endsection
