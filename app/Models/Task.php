<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $dates = ['deleted_at'];
    protected $table = 'tasks'; 
    protected $guarded = [];
    protected $fillable = ['title', 'description', 'student_id', 'due_date', 'status','month','path_id'];
       public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function path()
{
    return $this->belongsTo(PathTraining::class, 'path_id','id');
}
public function getMonthAttribute()
{
    return $this->due_date ? \Carbon\Carbon::parse($this->due_date)->format('m') : null;
}

}
