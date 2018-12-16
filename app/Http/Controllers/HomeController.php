<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Profile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$questions = $user->questions()->paginate(6);
        $questions = Question::all();
        $questions = Question::paginate(6);
        $user = Auth::user();
        $profile = $user->profile;
        return view('home')->with('questions', $questions);
    }
}
