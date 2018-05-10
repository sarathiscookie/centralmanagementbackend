@extends('layouts.app')

@section('title', 'User')

@section('content')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">User</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>User Details</h4>
                        </div>
                        <div class="card-body">
                            @if(session()->has('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Well Done! </strong>{{ session()->get('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->firstname }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>@if ($user->active === 1) <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Deactive</span> @endif</td>
                                            <td data-del="{{ $user->id }}">
                                                <a href="/user/{{ $user->id }}/edit" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <button type="button" class="btn btn-danger deleteUser"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <p class="text-center">No users</p>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
