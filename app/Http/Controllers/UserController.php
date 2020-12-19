<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function show()
    {
        return view('login');
    }

    private function userLogin($user_id) {
        Session::put('loggedIn', true);
        Session::put('id', $user_id);
    }

    private function userLogout() {
        Session::put('loggedIn', false);
        Session::put('id', null);
    }

    public function logIn(LoginRequest $request)
    {
        $validatedUser = $request->validated();
        try{
            $user = User::where('username', $validatedUser['username'])->firstOrFail();
        }catch (\Exception $exception){
            return redirect()->back()->with('message', 'Username not found.');
        }
        if (Hash::check($validatedUser['password'], $user->password)) {
            $this->userLogin($user->id);
            return redirect()->route('user', ['id' => $user->id]);
        }
        return redirect()->back()->with('message', 'Wrong Password');
    }

    public function showUser(Request $request)
    {
        $id = $request->route('id');
        $activities = Activity::where('user_id', $id)->get();
        return view('user', ['activities' => $activities]);
    }

    public function signOut()
    {
        $this->userLogout();
        return redirect()->route('signin');
    }

    public function register()
    {
        $this->userLogout();
        return view('register');
    }

    public function registerUser(UserRequest $request)
    {
        $validatedUser = $request->validated();
        try {
            $user = new User();
            $user->username = $validatedUser['username'];
            $user->password = bcrypt($validatedUser['password']);
            $user->save();
        }catch (\Exception $exception){
            return redirect()->back()->with('message', 'Oops something went wrong. Try again later.');
        }
        $this->userLogin($user->id);
        return redirect()->route('user', ['id' => $user->id]);
    }


}
