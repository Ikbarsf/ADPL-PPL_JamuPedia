<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CourseModuleContent extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'course_module_contents';
    protected $primaryKey = 'id';
}
