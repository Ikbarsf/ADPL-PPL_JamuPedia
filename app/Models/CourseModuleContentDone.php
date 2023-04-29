<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CourseModuleContentDone extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'course_module_content_finsishs';
    protected $primaryKey = 'id';
}
