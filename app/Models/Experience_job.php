<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience_job extends Model
{
    protected $table = 'experience_job';

    protected $fillable = [
        'job_id',
        'experience_id'
    ];

    use HasFactory;
}
