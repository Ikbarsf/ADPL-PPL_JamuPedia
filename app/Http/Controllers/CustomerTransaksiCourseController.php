<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerTransaksiCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:customer']);
    }

    public function index()
    {
        return view('customer.pages.transaksi.transaksi-course');
    }
}
