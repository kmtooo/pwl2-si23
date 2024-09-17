<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use Illuminate\View\View;

class SupplierController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : view
    {

        $supplier = new Supplier;
        $suppliers = $supplier->get_supplier()
                            ->latest()
                            ->paginate(10);

        //render view with products
        return view('supplier.index', compact('supplier'));
}
}