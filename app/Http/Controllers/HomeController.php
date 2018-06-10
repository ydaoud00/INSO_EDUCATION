<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth;

use App\Models\File;
use App\Models\Subject;

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
        $role = Auth::user()->role;
        $files = null;

        if($role == 'Admin'){

            $files = File::with('subject', 'user', 'comments.user')->latest()->paginate(5);

        }else if($role == 'Profesor'){ 

            $subjects = Subject::where('center_id', Auth::user()->center_id)->where('grade_id', Auth::user()->grade_id)->get(['id']);

            $files = File::with('subject', 'user', 'comments.user')->whereIn('subject_id', $subjects)->latest()->paginate(3);

        }else{

            $subjects = Subject::where('center_id', Auth::user()->center_id)->where('grade_id', Auth::user()->grade_id)->where('course', Auth::user()->course)->get(['id']);

            $files = File::with('subject', 'user', 'comments.user')->whereIn('subject_id', $subjects)->latest()->paginate(5);

        }

        return View::make('home')->with('files', $files);
    }
}
