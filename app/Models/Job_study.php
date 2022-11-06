<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_study extends Model
{
    protected $table = 'job_study';

    protected $fillable = [
        'job_id',
        'study_id'
    ];

    use HasFactory;
}
