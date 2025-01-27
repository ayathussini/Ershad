<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PathTraining extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'path_training';
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'duration',
        'level',
    ];
    public function task()
{
    return $this->hasMany(Task::class , 'path_id');
}
    public function students()
{
    return $this->belongsToMany(Student::class);
}

}
