<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Subscriber;
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
    public function viewQuestions()
    {
        $questions = Question::all();
        return view('questions', compact('questions'));
    }
    public function subscribe()
    {
        $subscribers = Subscriber::all();
        return view('subscribers', compact('subscribers'));
    }
}
