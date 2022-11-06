<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_type extends Model
{
    protected $table = 'job_type';

    protected $fillable = [
        'job_id',
        'type_id'
    ];

    use HasFactory;
}
