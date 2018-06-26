<?php

namespace App\Http\Controllers;

use App\User;

class OrmController extends Controller
{
    // debugBar needed

    public function index()
    {
        return view('welcome');
    }

    public function eagerLoading()
    {
        // 1.6 sec  (301 requests)
        $users = User::all();
        foreach ($users as $user) {
//            echo $user->posts;
        }

        // 293ms (2 requests)
        $users = User::with('posts')->get();
        foreach ($users as $user) {
            echo $user->posts;
        }

    }
}
