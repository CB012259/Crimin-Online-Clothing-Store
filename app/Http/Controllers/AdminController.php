<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function admin()
    {
        if(auth()->user()->role == 'admin'){
            return view('home');
        }
        else{
            return view('dashboard');
        }

    }

}
