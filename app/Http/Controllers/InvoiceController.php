<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->get();

        return view('admin.invoice.index',compact('invoices'));
    }


    public function create()
    {
        $products = Product::latest()->get();
        return view('admin.invoice.index',compact('products'));
    }
}
