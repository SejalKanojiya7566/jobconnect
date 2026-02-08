<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'company',
        'location',
        'job_type',
        'salary',
        'description',
        'status'
    ];
}
