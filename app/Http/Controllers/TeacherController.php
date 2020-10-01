<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Enrollment;
use DB;
use Carbon\Carbon;
use App\User;
use App\Appointment;
use Mail;
class TeacherController extends Controller
{
    public function dashboard(){
        $title = "Dashboard";
        $this->updateStatus();
        $tomorrow = date("Y-m-d", strtotime("+1 day"));
        $pending = Appointment::with('student')->where('teacher_id','=',Session::get('teacher')->user_id)->where('status','=',0)->count();
        $today = Appointment::with('student')->where('teacher_id','=',Session::get('teacher')->user_id)->where('date','=',date("Y-m-d"))->count();
        $tomorrow = Appointment::with('student')->where('teacher_id','=',Session::get('teacher')->user_id)->where('date','=',$tomorrow)->count();
        return view('/teacher/dashboard',compact('title','pending','today','tomorrow'));
    }

    public function viewAllAppointments(){
        $title = "My Appointment";
        $this->updateStatus();
        $app = Appointment::with('student')->where('teacher_id','=',Session::get('teacher')->user_id)->get();
        return view('/teacher/appointments',compact('title','app'));

    }

    public function pendingAppointment(){

        $title = "Pending Appointment";
        $this->updateStatus();
        $app = Appointment::with('student')->where('teacher_id','=',Session::get('teacher')->user_id)->where('status','=',0)->get();
        return view('/teacher/pendingApp',compact('title','app'));
    }

    public function acceptAppointment(Request $request, $id){
        $app = Appointment::find($id);
        $app->status = 1;
        $app->teacher_message = $request['teacher_message'];
        $app->update();

        //write email sending code here: 

        $sender = User::where('user_id','=',$app->student_id)->first();
        $teacher = User::where('user_id','=',$app->teacher_id)->first();

    
        $to_name = $sender->first_name;
        $to_email = $sender->email;


        $data = array('name'=>$to_name, "body" => $teacher->full_name,"subject" => $app->course_id,'date'=>$app->date,"time"=>$app->time);
    
            
        Mail::send('emails.studentAccept', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Appointment Accepted');
            $message->from('aitmaster2020@gmail.com','AIT Master');
        });

        return back()->with('success','Appointment Accepted');
    }

    public function declineAppointment(Request $request, $id){
        $app = Appointment::find($id);
        $app->status = 2;
        $app->teacher_message = $request['teacher_message'];

      
        $app->update();


        $sender = User::where('user_id','=',$app->student_id)->first();
        $teacher = User::where('user_id','=',$app->teacher_id)->first();

    
        $to_name = $sender->first_name;
        $to_email = $sender->email;

        $tchMessage = $app->teacher_message;
        $data = array('name'=>$to_name, "body" => $teacher->full_name,"subject" => $app->course_id,'date'=>$app->date,"time"=>$app->time,"tchMessage"=>$tchMessage);
    
            
        Mail::send('emails.studentReject', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Appointment Rejected');
            $message->from('aitmaster2020@gmail.com','AIT Master');
        });


        return back()->with('success','Appointment Declined!');
    }

    public function updateTime(Request $request,$id){
        $app = Appointment::find($id);
        $app->change_time_message = $request['change_time_message'];
        $app->date = $request['date'];
        $app->time = $request['time'];
        $app->update();
        return back()->with('success','Appointment Time Changed!');
    }

    public function updateStatus(){

        $app = Appointment::where('teacher_id','=',Session::get('teacher')->user_id)->where('status','=','1')->get();

        foreach($app as $a){
             $appDate = new Carbon($a->date);
             $appDate1 = $appDate->addDays(1);
             $nowDate = Carbon::now();
             
             if($appDate1 < $nowDate){
                $a->status = 3;
                $a->update();
             }

        }


    }
}
