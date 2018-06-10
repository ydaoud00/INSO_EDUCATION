<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

use App\Models\Subject;
use App\Models\Center;
use App\Models\Grade;


class SubjectController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;
        
        if ($role == 'Profesor'){

                $center = Center:: find(Auth::user()->center_id);
                $grade = Grade:: find(Auth::user()->grade_id);
                $subjects = Subject::where('center_id', Auth::user()->center_id)->where('grade_id', Auth::user()->grade_id)->orderBy('course')->paginate(5);

                return View::make('subjects.index')->with(['center' => $center, 'grade' => $grade , 'subjects' => $subjects]);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'course' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('subjects/create')->withErrors($validator)->withInput(Input::all());
        
        } else {
            
            $subject = new Subject;
            $subject->name = $request->get('name');
            $subject->center_id = Auth::user()->center_id;
            $subject->grade_id = Auth::user()->grade_id;
            $subject->course = $request->get('course');
            $subject->save();

            Session::flash('message', 'Asignatura creada correctamente');
            return Redirect::to('subjects');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        Session::flash('message', 'Asignatura eliminada correctamente');
        return Redirect::to('subjects');
    }
}
