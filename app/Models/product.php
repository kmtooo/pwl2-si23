<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'product_category_id',
        'id_supplier',
        'description',
        'price',
        'stock',
    ];

    public function get_product(){
        $sql = $this->select("products.*", "category_product.product_category_name as product_category_name", "supplier.supplier_name")
                    ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
                    ->join('supplier', 'supplier.id', '=', 'products.id_supplier');

        return $sql;
    }

    public function get_category_product(){
        $sql = DB::table('category_product')->select('*');

        return $sql;
    }


public $timestamp = true;

public static function storeProduct($request, $image)
{
    return self::create([
                'image'               =>$image->hashName(),
                'title'               =>$request->title,
                'product_category_id' =>$request->product_category_id,
                'description'         =>$request->id_supplier,
                'id_supplier'         =>$request->description,
                'price'               =>$request->price,
                'stock'               =>$request->stock,
            ]);
}

}


