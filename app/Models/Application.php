<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    public function student()
{
    return $this->belongsTo(Student::class);
}

public function job()
{
    return $this->belongsTo(Job::class);
}
  use HasFactory;
  use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'applications'; 

    protected $fillable = [
        'student_id',
        'job_id',
        'status',
    ];
}
