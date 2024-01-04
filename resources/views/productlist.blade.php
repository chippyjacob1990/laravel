@extends('layouts.layout')
@section('content')
<div class="cards">
    <h3>Product List</h3>
    {{-- App name {{ $app_name }} --}}
    {!! $text !!}
    <div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if(isset($products))
            @foreach($products as $product)
            {{ $product }}
            <br>
            @endforeach
        @else
        No products
        @endif

    </div>
</div>
@endsection
