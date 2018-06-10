<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Auth;

use App\Models\Comment;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $file_id)
    {
        $rules = array(
            'description' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return response()->json(['status' => 'Fail'], 500); 
        
        } else {
            
            $comment = new Comment;
            $comment->description = $request->get('description');
            $comment->file_id = $file_id;
            $comment->user_id = Auth::user()->id;
            $comment->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $comment->save();

            return response()->json(['success' => true, 'created_at' => $comment->created_at], 200);
 
        }

    }

}
