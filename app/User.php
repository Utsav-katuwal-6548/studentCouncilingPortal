<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'user_id', 'integration_id', 'authentication_provider_id','login_id','password','first_name',
        'last_name','full_name','sortable_name','short_name','email','status'
    ];
    protected $table = 'users';
    public $timestamps = false;
    public $primaryKey = 'user_id';
    protected $keyType = 'string';
}
   
