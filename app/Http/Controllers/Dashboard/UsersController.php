<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $users = User::all();
            return view('dashboard.users.index')->with('users', $users);
        }
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Authorization Gate
        if (Gate::denies('selfUser', $user)) {
            return redirect(route('home'));
        } else {
            return view('dashboard.users.show')->with('user', $user);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // Authorization Gate
        if (Gate::denies('selfUser', $user)) {
            return redirect(route('home'));
        } else {
            $roles = Role::all();

            return view('dashboard.users.edit')->with([
                'user' => $user,
                'roles' => $roles
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles()->sync($request->roles);

        $user->save();

        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if (Gate::denies('manageUsers')) {
            return redirect(route('home'));
        } else {
            $user->roles()->detach();
            $user->delete();

            return redirect()->route('dashboard.users.index');
        }
    }
}
