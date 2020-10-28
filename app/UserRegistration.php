<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRegistration extends Model
{
    protected $fillable = ['company_name', 'email', 'mobile', 'hr_name', 'password','address'];

     public function images(){

        return $this->hasMany(UserImages::class,'user_registration_id', 'id');
    }
}
