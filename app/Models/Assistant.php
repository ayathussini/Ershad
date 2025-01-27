<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assistant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'assistants';

    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'phone',
        'city',
        'address',
        'university',
        'faculty',
        'nationality',
        'path',
        'years_of_experiense	',
        'cv',
        'age',
        'gender',
        'support_type',
        'available_time'
    ];
    public function student()
{
    return $this->belongsTo(Student::class);
}
public function courses()
{
    return $this->belongsToMany(Course::class);
}

}
