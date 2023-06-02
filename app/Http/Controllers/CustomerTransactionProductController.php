<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerTransactionProductController extends Controller
{
    public function __construct() {
        $this->middleware('can:customer');
    }
    private $param;
    public function index()
    {
        try{

            $this->param['getProducts'] = Product::all();
            return view('customer.pages.product.list', $this->param);
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    
    }
    public function store(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if($product->quantity < $request->jumlah_pesanan){
                return redirect()->back()->withError('Gagal Memesan Produk.');
            }
            $transaction = Transaction::updateOrCreate([
                'product_id' => $id,
                'user_id' => Auth::user()->id,
                'jumlah_pesanan' => $request->jumlah_pesanan,
                'is_payment' => false
            ]);
            if(! $transaction->wasRecentlyCreated){
                $transaction->jumlah_pesanan += $request->jumlah_pesanan;
                $transaction->save();
            }

            $product->quantity -= $request->jumlah_pesanan;
            $product->save();
            return redirect()->back()->withStatus('Berhasil Memesan Produk.');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withError('Terjadi kesalahan pada database', $e->getMessage());
        }
    }
    public function update($id)
    {
        Transaction::find($id)->update([
                        'is_payment' => true,
                        'status' => 'Diproses'
                    ]);
        return redirect()->back()->withStatus('Berhasil melakukan pembayaran');
    }
    public function myProduct()
    {
        $my_products = Transaction::where('user_id', Auth::user()->id)
                                    ->where('is_payment', false)->get();
        $is_payment = Transaction::where('user_id', Auth::user()->id)
                                    ->where('is_payment', true)->latest()->get();
        return view('customer.pages.product.keranjang', [
            'my_products' => $my_products,
            'is_payment' => $is_payment
        ]);
    }
    public function myHistory(){
        $transactions = Transaction::where('user_id', auth()->user()->id)
                                    ->where('status', "Selesai")->get();
        return view('customer.pages.product.riwayat', [
            'transactions' => $transactions
        ]);
    }


    public function detail($id)
    {   
        $this->param['getDetailProduct'] = Product::find($id);
        
        return view('customer.pages.product.detail', $this->param); 
    }
}
