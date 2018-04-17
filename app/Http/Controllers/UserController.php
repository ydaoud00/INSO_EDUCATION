<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Session;
use Hash;
use Auth;

use App\Models\User;
use App\Models\Center;
use App\Models\Grade;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('center', 'grade')->whereIn('role', ['Profesor', 'Estudiante'])->paginate(5);

        return View::make('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centers = Center::where('type', 'Colegio')->where('city', 'Madrid')->pluck('name', 'id');
        $grades = Grade::where('type', 'Colegio')->pluck('name', 'id');

        return view('users.create')->with(['centers' => $centers, 'grades' => $grades]);
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|string',
            'center_id' => 'required',
            'grade_id' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('users/create')->withErrors($validator)->withInput(Input::except('password'));
        
        } else {

            $user = new User;
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->role =  $request->get('role');
            $user->center_id = $request->get('center_id');
            $user->grade_id = $request->get('grade_id');

            if($user->role != "Profesor")
                $user->course = $request->get('course');

            $user->save();

            Session::flash('message', 'Usuario creado correctamente!');
            return Redirect::to('users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::with('center', 'grade')->find($id);
        $centers = Center::where('type', $user->grade->type)->where('city', $user->center->city)->pluck('name', 'id');
        $grades = Grade::where('type', $user->grade->type)->pluck('name', 'id');

        return View::make('users.show')->with(['user' => $user, 'centers' => $centers, 'grades' => $grades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('center', 'grade')->find($id);
        $centers = Center::where('type', $user->grade->type)->where('city', $user->center->city)->pluck('name', 'id');
        $grades = Grade::where('type', $user->grade->type)->pluck('name', 'id');

        return View::make('users.edit')->with(['user' => $user, 'centers' => $centers, 'grades' => $grades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,id,'.$id,
            'password' => 'required|string|min:6',
            'role' => 'required|string',
            'center_id' => 'required|exists:centers,id',
            'grade_id' => 'required|exists:grades,id',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('users/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));

        } else {
            
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->role =  $request->get('role');
            $user->center_id = $request->get('center_id');
            $user->grade_id = $request->get('grade_id');

            if($user->role != "Profesor")
                $user->course = $request->get('course');

            $user->save();

            if(Auth::user()->role != "Admin"){

                Session::flash('message', 'Tu perfil ha sido modificado correctamente');
                return Redirect::to('/users/'.$user->id);
            }else{

                Session::flash('message', 'usuario editado correctamente');
                return Redirect::to('users');
            }
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
        $user = User::find($id);
        $user->delete();

        Session::flash('message', 'Usuario eliminado correctamente');
        return Redirect::to('users');
    }
}
