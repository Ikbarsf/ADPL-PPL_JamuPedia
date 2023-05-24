<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Enroll extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'enrolls';
    protected $primaryKey = 'id';
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
