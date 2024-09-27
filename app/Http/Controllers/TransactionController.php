<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;  // Pastikan penamaan model yang benar
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index() : View
    {
        $transaksi_penjualan = new Transaction;
        $data = $transaksi_penjualan->get_transaction()->latest()->paginate(10);
             
        foreach ($data as $key => $value) {
            $data[$key]['total_harga_'] = $value['jumlah_pembelian'] * $value['price'];
        }

        return view('transaction.index', compact('data'));
    }
}


