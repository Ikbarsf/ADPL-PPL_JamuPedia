<?php

namespace App\Models;

use App\Models\Product;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, HasRoles;
    protected $table = 'product_categories';
    protected $primaryKey = 'id';
    // public function product(){
    //     return $this->belongsTo(Product::class);
    // }
}
