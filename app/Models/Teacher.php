<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table        = 'teachers';
    protected $fillable     = ['school_id', 'first_name', 'last_name', 'email'];

    public function cohorts(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'cohort_teacher');
    }


}
