<?php

namespace App\Http\Controllers;

use App\Category;

class GeneralController extends Controller
{
    public function loadLogin()
    {
        $categories = Category::all();
        return view('login', ['categories' => $categories]);
    }

    public function loadSignup()
    {
        $categories = Category::all();
        return view('signup', ['categories' => $categories]);
    }

    public function about()
    {
        $categories = Category::all();
        return view('about', ['categories' => $categories]);
    }
}
