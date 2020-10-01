<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $fillable = [
        'admin_id','full_name','short_name','email','status'
    ];
    protected $table = 'admin';
    public $timestamps = false;
    public $primaryKey = 'admin_id';
    
}
