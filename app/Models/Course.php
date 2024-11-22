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


    protected $fillable = [
        'title',
        'description',
        'instructor',
        'category',
        'duration', 
    ];
}
