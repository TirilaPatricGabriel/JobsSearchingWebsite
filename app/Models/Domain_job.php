<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain_job extends Model
{
    protected $table = 'domain_job';

    protected $fillable = [
        'job_id',
        'domain_id'
    ];

    use HasFactory;
}
