<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

  protected $fillable = [
    'name_ar',
    'name_en',
    'email',
    'phone',
    'age',
    'gender',
    'address',
    'city',
    'university',
    'faculty',
    'nationality',
    'training_path',
    'personality_test_results',
    'english_level_test_results',
];

    protected $dates = ['deleted_at'];

    public function applications()
{
    return $this->hasMany(Application::class);
}
   public function paths()
{
    return $this->belongsToMany(PathTraining::class);
}
public function courses()
{
    return $this->belongsToMany(Course::class);
}
 public function assistants()
{
    return $this->hasMany(Assistant::class);
}
public function agent()
{
    return $this->belongsTo(Agent::class);
}
public function jobs()
{
    return $this->belongsToMany(Job::class);
}


}
