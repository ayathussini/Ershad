<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    public function applications()
{
    return $this->hasMany(Application::class);
}
     use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
protected $table = 'job'; 

    protected $fillable = [
        'title',
        'description',
        'location',
        'company',
        'job_type', 
        'salary'
    ];
}
