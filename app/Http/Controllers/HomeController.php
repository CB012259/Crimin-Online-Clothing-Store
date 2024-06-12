<?php

namespace App\Http\Controllers;

class HomeController
{
    public function user()
    {
        if (auth()->user()->role == 'user') {
            return view('dashboard');
        }

else{
    return view('home');}
    }
}
