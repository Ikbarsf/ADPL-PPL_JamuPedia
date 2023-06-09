<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Course extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'courses';
    protected $primaryKey = 'id';
    public function enroll(){
        return $this->hasMany(Enroll::class);
    }
}
