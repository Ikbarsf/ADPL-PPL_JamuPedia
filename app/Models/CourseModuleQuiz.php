<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CourseModuleQuiz extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'course_module_quizes';
    protected $primaryKey = 'id';
}
