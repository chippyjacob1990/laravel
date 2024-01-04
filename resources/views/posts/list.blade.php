@extends('layouts.layout')
@section('content')
<h1> Posts </h1>
	@if (session('success'))
		<div class="alert alert-success" role="alert">
				{{ session('success') }}
		</div>
	@endif
<div>
<a href="{{ route('posts.create') }}"  class="btn btn-success btn-sm my-2">Create New Post</a>
</div>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th scope="col">S#</th>
			<th scope="col">Title</th>
			<th scope="col">Content</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody>
			@foreach($posts as $post)
			<tr>
					<th scope="row">{{ $loop->iteration }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ $post->content }}</td>
					<td>
						<ul class="list-unstyled">
						  <li><a class="btn btn-info" href="{{route('posts.create')}}" >Edit</a></li>
					  </ul>
				</td>
			</tr>
			@endforeach
  </tbody>
</table>
@endsection('content')