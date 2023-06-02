<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CustomerProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }

    private $param;
    public function index()
    {
        try {
            // $this->param['getProducts'] = \DB::table('products')
            //                             ->select('products.*', 'product_categories.category_name')
            //                             ->join('product_categories', 'products.category_id', 'product_categories.id')
            //                             ->get();
            $this->param['getProducts'] = Product::all();
                return view('customer.pages.product.list', $this->param);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
            }
    }
}
