<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cohort extends Model
{
    use HasFactory;

    protected $table        = 'cohorts';
    protected $fillable     = ['school_id', 'cohort', 'description', 'start_date', 'end_date'];

    public function teachers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'cohort_teacher');
    }


}
