<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'resume',
        'status'
    ];
     //  RELATION WITH JOB
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
