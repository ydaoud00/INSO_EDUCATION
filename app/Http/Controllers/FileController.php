<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Session;
use Auth;

use App\Models\File;
use App\Models\Subject;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($subject_id)
    {
        $files = File::with('user', 'comments.user')->where('subject_id', $subject_id)->orderBy('created_at', 'desc')->paginate(2);
        $subject = Subject::find($subject_id);

        return View::make('files.index')->with(['files' => $files, 'subject' => $subject]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $subject_id)
    {
        $rules = array(
            'description' => 'required|string|max:255',
            'file' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('subjects/' . $subject_id . 'files/create')->withErrors($validator)->withInput(Input::all());
        
        } else {

            if($request->hasfile('file'))
            {
                $file = $request->file('file');
                $name = time() . $file->getClientOriginalName();
                $file->storeAs('files', $name);
            }
            
            $file = new File;
            $file->description = $request->get('description');
            $file->path = $name;
            $file->likes = 0;
            $file->subject_id = $subject_id;
            $file->user_id = Auth::user()->id;
            $file->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $file->save();

            Session::flash('message', 'Archivo subido correctamente!');
            return Redirect::to('subjects/' . $subject_id . '/files');
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
        $file = File::find($id);
        return response()->download(storage_path('app/files/' . $file->path));
    }

    /**
     * like the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like($id)
    {
        $file = File::find($id);
        $file->likes ++;
        $file->save();

        return response()->json(['success' => true], 200);
    }
}
