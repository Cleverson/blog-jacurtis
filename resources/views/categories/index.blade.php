@extends('layouts.main')

@section('title', '| All Categories')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Categories</h1>
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div><!-- end of .col-md-8  -->
		<div class="col-md-4">
			<div class="well">
				{!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
				<h2>New Category</h2>
				<div class="form-group">
					{{ Form::label('name', 'Name:')}}
					{{ Form::text('name', null, ['class' => 'form-control'])}}
				</div>
				<div class="form-group">
					{{ Form::button('<span class="glyphicon glyphicon-plus"> New Category</span>', ['class'=>'btn btn-success btn-block', 'type'=>'submit']) }}
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection
