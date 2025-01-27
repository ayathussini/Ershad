<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
        use HasFactory;
        use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'courses';
    protected $guarded = [];


   protected $fillable = ['title', 'description', 'instructor', 'duration', 'category','course_link'];
   public function students()
{
    return $this->belongsToMany(Student::class);
}
public function assistants()
{
    return $this->belongsToMany(Assistant::class);
}

}
