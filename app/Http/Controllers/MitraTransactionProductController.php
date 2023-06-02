<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class MitraTransactionProductController extends Controller
{
    public function __construct() {
        $this->middleware('can:mitra');
    }
    public function index()
    {
        $transactions = Transaction::where('is_payment', true)->latest()->get();
        return view('mitra.pages.product.index', [
            'transactions' =>$transactions
        ]);
    }
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->update(['status' => $request->status]);
        return redirect()->back()->withStatus('Berhasil mengubah status pesanan');
    }
    public function myHistory(){
        $product_id = array();
        foreach(auth()->user()->product as $i){
            array_push($product_id, $i->id);
        }
        $transactions = Transaction::whereIn('product_id', $product_id)
                                    ->where('status', "Selesai")->get();
        return view('customer.pages.product.riwayat', [
        'transactions' => $transactions
        ]);
    }
}
