<?php

namespace App\Models;

use App\Models\ProductCategory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'products';
    protected $primaryKey = 'id';
    // public function productCategory(){
    //     return $this->hasMany(ProductCategory::class);
    // }
}
