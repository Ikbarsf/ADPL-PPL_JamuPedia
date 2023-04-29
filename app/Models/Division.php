<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Division extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'divisions';
    protected $primaryKey = 'id';
}
