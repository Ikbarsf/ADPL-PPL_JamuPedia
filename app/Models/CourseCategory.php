<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CourseCategory extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'course_categories';
    protected $primaryKey = 'id';
}
