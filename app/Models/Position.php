<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Position extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'positions';
    protected $primaryKey = 'id';
}
