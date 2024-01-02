<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class university extends Model
{
    use HasFactory;
    protected $table = 'university';
    protected $fillable =[
        'name','courses'

    ];
    public function courses()
    {
        return $this->belongsToMany(courses::class, 'course_university', 'university_id', 'course_id');
    }
}
