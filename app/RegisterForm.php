<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterForm extends Model
{
    public $fillable = [
        "name",
        "email_id",
        "mobile_no",
        "description",
    ];

    public static $rules = [
        "name" => "required",
        "email_id" => "required",
        "mobile_no" => "required",
        "description" => "required"
    ];
}
