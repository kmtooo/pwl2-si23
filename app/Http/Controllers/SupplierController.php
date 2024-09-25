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
     * @return view
     */
    public function index() : view
    {

       $supplier = Supplier::paginate(10);

        //render view with products
        return view('suppliers.index', compact('supplier'));
}
}