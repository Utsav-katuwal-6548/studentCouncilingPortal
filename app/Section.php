<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section_id','course_id','integration_id','name','status','start_date','end_date'
     ];
     protected $table = 'sections';
     public $timestamps = false;
     public $primaryKey = 'section_id';
     protected $keyType = 'string';

}
