<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table        = 'studentS';
    protected $fillable     = ['school_id', 'name', 'birthday'];


}
