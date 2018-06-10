<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mail;

class ContactController extends Controller
{
    public function show() 
	{
		return view('contact');
	}

	public function mailToAdmin(Request $request)
	{        

		 $rules = array(
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'body' => 'required|string',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            
            return Redirect::to('contact')->withErrors($validator)->withInput(Input::all());
        
        } else {
            

       		$contactName = Input::get('name');
		    $contactEmail = Input::get('email');
		    $contactBody = Input::get('body');

		    $data = array('name'=>$contactName, 'email'=>$contactEmail, 'body'=>$contactBody);
 			
 			Mail::send('layouts.email', $data, function($message) use ($request){
           		$message->from($request->email, $request->name);
 				$message->to(env('CONTACT_MAIL'), env('CONTACT_NAME'))->subject('[Education duda]');;
       		});
		 
		    return redirect()->back()->withSuccess('Gracias por ponerte en contacto con nosotros!'); 
	    }
	}
}
