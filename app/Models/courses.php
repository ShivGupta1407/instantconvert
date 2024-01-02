<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name'
    ];
    public function universities()
    {
        return $this->belongsToMany(University::class, 'course_university', 'course_id', 'university_id');
    }
}
