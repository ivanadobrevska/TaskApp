<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function show() {
        return view('login');
    }

    public function logIn(UserRequest $request) {
        $validatedUser = $request->validated();
        $users = User::all();
        foreach($users as $user) {
            if(($user->username === $validatedUser['username']) && Hash::check($validatedUser['password'], $user->password)) {
                Session::put('loggedIn', true);
                Session::put('id', $user->id);
                return redirect()->route('user', ['id' => $user->id]);
            }
        }
        return redirect()->back()->with('message', 'Wrong username or password');
    }

    public function showUser(Request $request) {
        if(Session::get('loggedIn') && Session::get('id')==$request->route('id')) {
            $id = $request->route('id');
            $activities = Activity::where('user_id', $id)->get();
            return view('user', ['activities' => $activities]);
        } else {
            Session::put('loggedIn', false);
            Session::put('id',null);
            return view('login');
        }
      
    }

    public function signOut() {
        Session::put('loggedIn', false);
        Session::put('id',null);
        return redirect()->route('signin');
    }

}
