@extends('layouts.layout')

@section('content')
	<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
		<h2> Contact Us </h2>
		<div>We are a small store which provides dress for women.
			<p> Please contact below persons:-
				@if(count($people))
					<ul>
						@foreach($people as $name=>$phone)
							<li>{{ $name }} - {{ $phone }}</li>
						@endforeach
					</ul>
				@endif
      </p>
		</div>
	</div>
@endsection



