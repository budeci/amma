<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter as Newsletter;
use Validator;
use Mail;
class NewsletterController extends MainController
{
    public function subscribe(Request $request, Newsletter $newsletter)
    {
    	$validator = Validator::make($request->all(), [
            'email' => 'required|unique:newsletter|max:255'
        ]);

        if ($validator->passes()) {
        	$newsletter->email = $request->input('email');
        	$type = $newsletter->save();
        }else{
        	$type = false;
        }
        $array_respons = array('type' =>$type, 'content'=>$validator->errors());
		echo json_encode($array_respons);
		die();
    }

    public function sendform(Request $request)
    {
    	$validator = Validator::make($request->all(), [
			'name'  => 'required|max:255',
			'email' => 'required|max:255',
			'phone' => 'required|max:255'
        ]);
        //dd($request->all());

        if ($validator->passes()) {
        	$send = Mail::send('mail.sendform', ['data' => $request->all()], function ($message) {
	            $message->from('hello@app.com', 'Your Application');
	            $message->to('budeci.mihail@gmail.md')->subject('AmmA');
	        });
        }else{
        	$type = false;
        	$send = false;
        }
        $array_respons = array('type' => $validator->passes(), 'content'=>$validator->errors(), 'error'=> $send);
		echo json_encode($array_respons);
		die();
    }
}
