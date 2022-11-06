<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_location extends Model
{
    protected $table = 'job_location';

    protected $fillable = [
        'job_id',
        'location_id'
    ];

    use HasFactory;
}
