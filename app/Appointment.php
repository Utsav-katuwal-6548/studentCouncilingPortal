<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'appointment_id','teacher_id','student_id','course_id','message','date','time','status','teacher_message','change_time_message'
     ];
     protected $table = 'appointment';
     public $timestamps = false;
     public $primaryKey = 'appointment_id';
 
     public function teacher(){
        return $this->hasOne('App\User', 'user_id', 'teacher_id');
      }

      public function student(){
        return $this->hasOne('App\User', 'user_id', 'student_id');
      }
}
