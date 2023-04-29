<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserEmployee extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'user_employees';
    protected $primaryKey = 'id';
}
