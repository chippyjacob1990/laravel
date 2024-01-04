@extends('layouts.layout')

@section('content')
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
          <h2> Welcome to My Store!! </h2>

          <div class="container">
            <div class="row">
              <div class="col-sm-8">
              What is My Store?
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <div class="col-sm-4">  
                @if(!auth()->user()) 
                @include('user.login')
                @endif
              </div>
            </div>
          </div>
        </div>
@endsection