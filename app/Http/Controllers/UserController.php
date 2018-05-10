<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role_id', 2)->paginate(5);

        return view('user.index', ['users' => $users]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        if($id) {
            $user = User::find($id);

            return view('user.edit', ['user' => $user]);
        }
        return redirect()->back()->with('status', 'Warning! Better check yourself, you are not looking too good.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        if($id) {
            $user            = User::find($id);
            $user->firstname = $request->name;
            $user->email     = $request->email;
            $user->phone     = $request->phone;
            $user->address   = $request->address;
            $user->active    = $request->status;
            $user->save();

            return redirect()->route('user.index')
                ->with('status', 'User details updated successfully!');
        }
        else {
            return redirect()->route('user.edit')->with('warning', 'Warning! Better check yourself, you are not looking too good.');
        }
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
            User::destroy($id);

            session()->flash('status', 'User details deleted successfully');
            return response()->json(['response' => 'success'], 200);
        }
        return response()->json(['error' => 'Warning! Better check yourself, you are not looking too good.'], 422);
    }
}
