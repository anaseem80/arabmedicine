<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $fillable = ['id', 'name', 'description', 'image', 'price', 'free'];

    public function section()
    {
        return $this->hasMany('App\Models\Section', 'course_id', 'id')->with('lesson');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_courses', 'course_id', 'user_id', 'id', 'id');
    }
}
