@extends('layouts.layout')

@section('content')

<h1>Products</h1>
<div class="items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    <ul>
    <li>Product1</li>
    <li>Product2</li>
    <li>Product3</li>
    <li>Product4</li>
    <li>Product5</li>
    <li>Product6</li>
    @if(isset($name))
    <li>{{ $name }}</li>
    @else
    <li>No parameter as name parameter</li>
    @endif
    </ul>

</div>
@endsection