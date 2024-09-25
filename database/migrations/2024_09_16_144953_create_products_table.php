<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create 'products' table
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->nullable()->index();
            $table->foreignId('id_supplier')->nullable()->constrained('supplier')->onDelete('set null');
            $table->string('image');
            $table->string('title');
            $table->text('description');
            $table->bigInteger('price');
            $table->integer('stock')->default(0);
            $table->timestamps();
        });

        // Create 'category_product' table
        Schema::create('category_product', function (Blueprint $table) {
            $table->id();
            $table->string('product_category_name');
            $table->timestamps();
        });

        // Create 'supplier' table
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('pic_supplier');
            $table->string('alamat_supplier');
            $table->string('no_hp_pic_supplier');
            $table->timestamps();
        });

        Schema::create('transaksi_penjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_products')->constrained('products')->onDelete('cascade');
            $table->integer('jumlah_pembelian');
            $table->string('nama_kasir');
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop 'transaksi_penjualan' table
        Schema::dropIfExists('transaksi_penjualan');

        // Drop 'products' table
        Schema::dropIfExists('products');

        // Drop 'category_product' table
        Schema::dropIfExists('category_product');

        // Drop 'supplier' table
        Schema::dropIfExists('supplier');
    }
};
