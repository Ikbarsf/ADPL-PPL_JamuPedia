<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CourseModule extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'course_modules';
    protected $primaryKey = 'id';
}
