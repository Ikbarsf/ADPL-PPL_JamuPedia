<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraECommersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:mitra']);
    }

    private $param;
    public function index()
    {
        try {
            $this->param['getProducts'] = \DB::table('products')
                                        ->select('products.*', 'product_categories.category_name')
                                        ->join('product_categories', 'products.category_id', 'product_categories.id')
                                        ->get();
                return view('mitra.pages.barang.list', $this->param);
            } catch (\Exception $e) {
                return redirect()->back()->withError($e->getMessage());
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
            }
    }


    public function add()
    {
        try {
            $this->param['getMentor'] = User::whereHas('roles', function($thisRole){
                $thisRole->where('name', 'admin');
            })->get();

            return view('mitra.pages.barang.add', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
}
