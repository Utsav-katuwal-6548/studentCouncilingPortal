<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class AppointmentController extends Controller
{
    public function check(){
        $to_name = 'Sushant';
        $to_email = 'sushantbasnet21@gmail.com';
        $data = array('name'=>"Student Counsil", "body" => "Test mail");
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('aitmaster2020@gmail.com','AIT Master');
        });
    }
}
