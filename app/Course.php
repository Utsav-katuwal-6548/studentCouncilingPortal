<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
       'course_id','integration_id','short_name','long_name','account_id','term_id','status','start_date','end_date','course_format','blueprint_course_id'
    ];
    protected $table = 'courses';
    public $timestamps = false;
    public $primaryKey = 'course_id';
    protected $keyType = 'string';
}

