<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = "user";
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success', 'Successfully registered account');
    }

    public function login(LoginRequest $request)
    {
        $auth = Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        if ($auth) {
            return redirect('/');
        }
        return back()->withErrors('Wrong email and password')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showAllAdmin()
    {
        $users = User::where("role", '=', "admin")->get();
        $categories = Category::all();
        return view('user', ['user' => $users, 'categories' => $categories]);
    }

    public function showAllUser()
    {
        $users = User::where("role", '=', "user")->get();
        $categories = Category::all();
        return view('user', ['user' => $users, 'categories' => $categories]);
    }

    public function showProfile()
    {
        $categories = Category::all();
        return view('profile', ['categories' => $categories]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $users = User::where("id", '=', Auth::user()->id)->first();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->save();
        $categories = Category::all();
        return view('profile', ['user' => $users, 'categories' => $categories]);
    }

    public function deleteUser($id)
    {
        Article::where("user_id", '=', $id)->delete();
        User::where("id", '=', $id)->delete();
        $users = User::where("role", '=', "user")->get();
        $categories = Category::all();
        return view('user', ['user' => $users, 'categories' => $categories]);
    }
}
