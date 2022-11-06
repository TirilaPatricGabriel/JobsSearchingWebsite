<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_language extends Model
{
    protected $table = 'job_language';

    protected $fillable = [
        'job_id',
        'language_id'
    ];

    use HasFactory;
}
