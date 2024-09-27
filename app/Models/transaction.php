<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaksi_penjualan';

    protected $fillable = [
        'tanggal_transaksi', 
        'nama_kasir', 
        'id_products', 
        'jumlah_pembelian'
    ];

    public function get_transaction()
    {
        $sql = $this->select("transaksi_penjualan.*","products.title", "products.price",
                            "category_product.product_category_name as product_category_name",
                            DB::raw("(jumlah_pembelian*price) as total_harga")) //, DB::raw("(jumlah_pembelian*price) as total_harga")
                            ->join("products", "transaksi_penjualan.id_products", "=", "products.id")
                            ->join('category_product', 'category_product.id', '=', 'products.product_category_id');

        return $sql;
    }
}
