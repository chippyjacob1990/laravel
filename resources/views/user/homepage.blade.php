@extends('layouts.layout')
@section('content')
 <h3> Welcome to My Store</h3>
 <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
{{-- @if(session()->has('username')) <h5>{{ session('username') }}</h5> @endif --}}
 <h5>Hi {{ auth()->user()->name }}</h5>
 </div>
@endsection