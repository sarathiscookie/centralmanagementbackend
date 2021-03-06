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
                                        @include('server.form')
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

                            <div id="warning"></div>

                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Server Name</th>
                                        <th>Host</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Vpn Limit</th>
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
                                            <td>{{ $server->limit }}</td>
                                            <td>{{ $server->description }}</td>
                                            <td data-del="{{ $server->id }}">
                                                <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#updateServerModal_{{ $server->id }}"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-danger deleteServer"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                        </tr>

                                        <!-- Update server model begin -->
                                        <div id="updateServerModal_{{ $server->id }}" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true" class="modal fade text-left">
                                            <div role="document" class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 id="createServerHeading" class="modal-title">Update Server</h5>
                                                        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <div id="errors"></div>

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Server Name</label>
                                                            <input type="text" name="serverName" id="updateServerName_{{ $server->id }}" placeholder="Enter server name" class="form-control" value="{{ $server->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Host</label>
                                                            <input type="text" name="serverHost" id="updateServerHost_{{ $server->id }}" placeholder="Enter host" class="form-control" value="{{ $server->host }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <input type="text" name="serverLocation" id="updateServerLocation_{{ $server->id }}" placeholder="Enter location" class="form-control" value="{{ $server->location }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>VPN Server Limit</label>
                                                            <input type="text" name="serverLimit" id="updateServerLimit_{{ $server->id }}" placeholder="Enter limit" class="form-control" value="{{ $server->limit }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <textarea name="serverDescription" id="updateServerDescription_{{ $server->id }}" class="form-control" rows="3" placeholder="Description...">{{ $server->description }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                                                        <button type="button" data-id="{{ $server->id }}" class="btn btn-primary updateServer" value="updateServer">Update</button>
                                                    </div>
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
                    {{ $servers->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
