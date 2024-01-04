@extends('layouts.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit User
                </div>
                <div class="float-end">
                    <a href="{{ route('user.list') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method("POST")
                 
                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">User ID</label>
                        <div class="col-md-6">
                          <input type="text" readonly="readonly" disabled="disabled" class="form-control" id="code" name="code" value="{{ $user->id }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">Email</label>
                        <div class="col-md-6">
                          <input type="text" readonly="readonly" disabled="disabled" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="pincode" class="col-md-4 col-form-label text-md-end text-start">pincode</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="pincode" name="pincode" value="@if($user->address){{ $user->address->pincode }}@endif">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">City</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="city" name="city" value="@if($user->address){{ $user->address->city }}@endif">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="street_address" class="col-md-4 col-form-label text-md-end text-start">Street Address</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="street_address" name="street_address" value="@if($user->address){{ $user->address->street_address }}@endif">
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start">Country</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control" id="country" name="country" value="@if($user->address){{ $user->address->country }}@endif">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection