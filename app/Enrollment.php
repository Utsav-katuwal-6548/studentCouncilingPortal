<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'course_id','user_id','role','role_id','section_id','status','associated_user_id','limit_section_privileges'
     ];
     protected $table = 'enrollments';
     public $timestamps = false;
 
}
