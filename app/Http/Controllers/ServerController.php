<?php

namespace App\Http\Controllers;

use App\Server;
use Illuminate\Http\Request;
use App\Http\Requests\ServerRequest;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::paginate(5);

        return view('server.index', ['servers' => $servers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServerRequest $request)
    {
        $server              = new Server();
        $server->name        = $request->serverName;
        $server->host        = $request->serverHost;
        $server->location    = $request->serverLocation;
        $server->limit       = $request->serverLimit;
        $server->description = $request->serverDescription;
        $server->save();

        return redirect()->route('server.index')
            ->with('status', 'Server added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServerRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServerRequest $request, $id)
    {
        if(isset($request->updateServer)) {
            $server              = Server::find($id);
            $server->name        = $request->serverName;
            $server->host        = $request->serverHost;
            $server->location    = $request->serverLocation;
            $server->limit       = $request->serverLimit;
            $server->description = $request->serverDescription;
            $server->save();

            session()->flash('status', 'Successfully updated server details');
            return response()->json(['response' => 'success'], 200);
        }
        return response()->json(['error' => 'Warning! Better check yourself, you are not looking too good.'], 422);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id) {
            Server::destroy($id);

            session()->flash('status', 'Deleted server details successfully');
            return response()->json(['response' => 'success'], 200);
        }
        return response()->json(['error' => 'Warning! Better check yourself, you are not looking too good.'], 422);
    }
}
