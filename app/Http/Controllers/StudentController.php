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
class StudentController extends Controller
{
    public function dashboard(){
        $title = "Dashboard";
        $pending = Appointment::with('teacher')->where('student_id','=',Session::get('student')->user_id)->where('status','=',0)->get();
        $selected = Appointment::with('teacher')->where('student_id','=',Session::get('student')->user_id)->where('status','=',1)->get();
        $rejected = Appointment::with('teacher')->where('student_id','=',Session::get('student')->user_id)->where('status','=',2)->get();

        $dates =[]; 

        foreach($pending as $a){
            $dateTime = $a->date.'T'.$a->time;
           
        
            $abc = ["title" =>$a->teacher->full_name,"start"=>$dateTime,"color" => 'yellow'];
            array_push($dates,$abc);
        }
        foreach($selected as $a){
            $dateTime = $a->date.'T'.$a->time;
            $abc = ["title" => $a->teacher->full_name,"start"=>$dateTime,"color" => 'green'];
            array_push($dates,$abc);
        }
        foreach($rejected as $a){
            $dateTime = $a->date.'T'.$a->time;
            $abc = ["title" => $a->teacher->full_name,"start"=>$dateTime,"color" => 'red'];
            array_push($dates,$abc);
        }


    
        return view('/student/dashboard',compact('title','dates'));

    }

    public function viewAllCourses(Request $request){
        $title = "All Courses";
        $studentId = Session::get('student')->user_id;
        $courses = DB::table('enrollments')
                 ->join('sections','enrollments.section_id','=','sections.section_id')
                 ->join('courses','sections.course_id','=','courses.course_id')
                 ->select('enrollments.section_id','sections.name','courses.long_name','courses.short_name','courses.course_id')
                 ->where('user_id','=',$studentId)
                 ->get();

        return view('/student/courses',compact('title','courses'));
    }

    public function getTeacherFromCourse($courseId){
        $title = "Select Teacher";
        if(strpos($courseId, '-SYD') !== false || strpos($courseId, '-MLB') !== false ){
            
            $plain = substr($courseId, 0, -4);
            $c1= $plain;
            $c2 = $plain.'-SYD';
            $c3 = $plain.'-MLB';
        
              $teachers = DB::table('enrollments')
                    ->join('users','enrollments.user_id','=','users.user_id')
                    ->select('enrollments.*','users.full_name','users.email')
                    ->where('course_id','=',$c1)
                    ->orwhere('course_id','=',$c2)
                    ->orwhere('course_id','=',$c3)
                    ->where('enrollments.role_id','=',4)    
                    ->get();

               
                    return view('student.courseTeacher',compact('title','teachers','courseId'));
        }else{
            
            $teachers = DB::table('enrollments')
                    ->join('users','enrollments.user_id','=','users.user_id')
                    ->select('enrollments.*','users.full_name','users.email')
                    ->where('course_id','=',$courseId)
                    ->where('role_id','=',4)
                    ->get();

                    return view('student.courseTeacher',compact('title','teachers','courseId'));
        }      



    }

    public function getTeacherAvailableTime($courseId,$teacherId){

        $title = "Select Time";
        $teacher = User::where('user_id','=',$teacherId)->first();
    
        return view('student.selectTime',compact('title','courseId','teacherId','teacher'));
    }

    public function checkTeacherDate($date,$teacherId){
        $date = new Carbon($date);
        $week = $date->weekOfYear;
        // return $week;

        $isAvailable = 'true';
        $appointments = DB::table('appointment')
                        ->select('appointment.*')
                        ->where('teacher_id','=',$teacherId)
                        ->get();

       
        foreach($appointments as $a){

            $apdate = new Carbon($a->date);
            $w1 = $apdate->weekOfYear;
            if($w1 == $week){
                $isAvailable = 'false';
            }
        }

        return $isAvailable;
    }


    public function finaliseAppointment(Request $request){

        $app = new Appointment();
        $app->teacher_id = $request['teacherId'];
        $app->course_id = $request['courseId'];
        $app->message = $request['message'];
        $app->date = $request['date'];
        $app->time = $request['time'];
        $app->student_id = Session::get('student')->user_id;
        $app->status = 0;
        $app->save();

        $sender = User::where('user_id','=',$app->student_id)->first();
        $teacher = User::where('user_id','=',$app->teacher_id)->first();
      

        $to_name = $sender->first_name;
        $to_email = $sender->email;

        $teacher_name = $teacher->first_name;
        $teacher_email = $teacher->email;

        $data = array('name'=>$to_name, "body" => $teacher->full_name,"subject" => $app->course_id,'date'=>$app->date,"time"=>$app->time);
        $data1 = array('name'=>$teacher->first_name, "body" => $sender->full_name,"subject" => $app->course_id,'date'=>$app->date,"time"=>$app->time,'msg'=>$app->message);
            
        Mail::send('emails.student', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Appointment Request Successfull');
            $message->from('aitmaster2020@gmail.com','AIT Master');
        });

        Mail::send('emails.teacher', $data1, function($message) use ($teacher_name, $teacher_email) {
            $message->to($teacher_email, $teacher_name)
                    ->subject('New Appointment Request');
            $message->from('aitmaster2020@gmail.com','AIT Master');
        });

        return redirect('/student/allCourses')->with('success','Appointment Sent');

    }

    public function myAppointments(){
        $title = "My Appointment";
        $app = Appointment::with('teacher')->where('student_id','=',Session::get('student')->user_id)->get();
        return view('student/appointment',compact('title','app'));
    }
}
