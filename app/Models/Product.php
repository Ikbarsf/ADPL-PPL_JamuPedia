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

    public function category() {
        return $this->belongsTo(ProductCategory::class); // don't forget to add your full namespace
    }
    public function transaction(){
        return $this->hasMany(Transaction::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
