@extends('layouts.layout')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('message'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <a class="btn btn-success my-2" href="{{ route('user.create') }}">Create New User</a>
        <div class="card">
            <div class="card-header">Users List</div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
						<th scope="col">Pincode</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $users->firstItem() + $loop->index }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
							<td>@if($user->address){{ $user->address->pincode }}@endif</td>
                            <td>{{ $user->status_text }}</td>
                            <td>
							<a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No User Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $users->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection