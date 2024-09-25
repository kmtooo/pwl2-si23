<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\View\View;

class TransaksiController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {

        $transaksi = new Transaksi;
        $transaksi = $transaksi->get_transaksi()
                            ->latest()
                            ->paginate(10);

        //render view with products
        return view('transaksi.index', compact('transaksi'));
}
}