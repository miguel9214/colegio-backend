<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    public $table = "courses";

    protected $fillable = [
        'name',
        'hours',
        'grade',
    ];

    public function students(){
        return $this->BelongsToMany(Student::class,"course_student");
    }
}
