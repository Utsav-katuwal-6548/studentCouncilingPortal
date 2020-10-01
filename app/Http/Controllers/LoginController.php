<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use App\Enrollment;
use App\Admin;
class LoginController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }



    public function handleGoogleCallback(Request $request)
    {
        try {
  
            $user = Socialite::driver('google')->user();
           
            $finduser = User::where('email', $user->email)->first();
            $admin = Admin::where('email',$user->email)->first();

            if($admin){
                    $request->session()->put('admin', $admin);
                    return redirect('/admin/dashboard')->with('success','Welcome');

            }
            else if($finduser){
             
                $enroll = Enrollment::where('user_id',$finduser->user_id)->first();

                if($enroll->role =='student'){
                $request->session()->put('student', $finduser);
                return redirect('/student/dashboard')->with('success','Welcome');

                }
                else if($enroll->role =='teacher'){
                    $request->session()->put('teacher', $finduser);
                    return redirect('/teacher/dashboard')->with('success','Welcome');
                }
               
            }else{

                return redirect('/login')->with('error','Invalid User');
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    public function handleGoogleCallbackAdmin(Request $request)
    {
        try {
  
            $user = Socialite::driver('google')->user();
           
            $finduser = User::where('email', $user->email)->first();
   
            if($finduser){
             
                $enroll = Enrollment::where('user_id',$finduser->user_id)->first();

                if($enroll->role =='student'){
                $request->session()->put('student', $finduser);
                return redirect('/student/dashboard')->with('success','Welcome');

                }
                else if($enroll->role =='teacher'){
                    $request->session()->put('teacher', $finduser);
                    return redirect('/teacher/dashboard')->with('success','Welcome');
                }
                // else if($enroll->role =='admin'){
                //     return redirect('/admin/dashboard')->with('success','Welcome');
                // }
            }else{

                return redirect('/login')->with('error','Invalid User');
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }

    public function logout(){

        session()->forget('teacher');
        session()->forget('student');
        session()->forget('admin');

        return redirect('/login')->with('success','Logged Out Successfully');
    }

}
