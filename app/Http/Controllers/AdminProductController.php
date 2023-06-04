<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getProducts'] = \DB::table('products')
                                        ->select('products.*')
                                        ->get();

            return view('admin.pages.product.list-product', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
