<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable=[
        "name",
        "age",
        "phone",
        "gender"
    ];
    use HasFactory;

}
