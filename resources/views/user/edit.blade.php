@extends('layouts.app')

@section('title', 'Edit user')

@section('content')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/user">User</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                        <div class="card-header d-flex align-items-center">
                            <h4>Edit User Details</h4>
                        </div>
                        <div class="card-body">
                            @if(session()->has('warning'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>OOPS! </strong>{{ session()->get('warning') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" class="form-horizontal">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Enter name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->firstname }}">

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" placeholder="Enter email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Enter phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}">

                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="Enter address" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $user->address }}">

                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <label class="col-sm-2 form-control-label">Status</label>
                                    <div class="col-sm-10 mb-3">
                                        <select class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" name="status">
                                            <option value="0">Choose status</option>
                                            <option value="1" @if($user->active === 1) selected @endif>Active</option>
                                            <option value="2" @if($user->active === 0) selected @endif>Deactive</option>
                                        </select>

                                        @if ($errors->has('status'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="line"></div>
                                <div class="form-group row">
                                    <div class="col-sm-4 offset-sm-2">
                                        <a href="/user" class="btn btn-secondary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
