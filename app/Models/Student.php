<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    public $table ="courses";

    protected $fillable = [
        'identification',
        'firtsname',
        'lastname',
        'photo',
    ];

    public function courses(){
        return $this->BelongsToMany(Course::class,"course_student");
    }
}
