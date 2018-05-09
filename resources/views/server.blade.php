@extends('layouts.app')

@section('title', 'Server')

@section('content')
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Server</li>
            </ul>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <!-- Page Header-->
            <header>
                <h1 class="h3 display">Server</h1>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Server Lists</h4>
                            <button type="button" data-toggle="modal" data-target="#createServerModal" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i> Create New Server</button>

                            <!-- Create server model begin -->
                            <div id="createServerModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true" class="modal fade text-left">
                                <div role="document" class="modal-dialog">
                                    <div class="modal-content">
                                        /////
                                    </div>
                                </div>
                            </div>
                            <!-- Create server model end -->
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
                                            <th>Server Name</th>
                                            <th>Host</th>
                                            <th>Location</th>
                                            <th>Description</th>
                                            <th>Vpm Server Limit</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($servers as $server)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $server->name }}</td>
                                                <td>{{ $server->host }}</td>
                                                <td>{{ $server->location }}</td>
                                                <td>{{ $server->description }}</td>
                                                <td>{{ $server->limit }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateServerModal_{{ $server->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                    <form action="{{ route('server.delete', ['id' => $server->id]) }}" method="DELETE">
                                                        {{csrf_field()}}
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Update server model begin -->
                                            <div id="updateServerModal_{{ $server->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" class="modal fade text-left">
                                                <div role="document" class="modal-dialog">
                                                    <div class="modal-content">
                                                        ///////
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Update server model end -->
                                        @empty
                                            <p class="text-center">No servers</p>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
