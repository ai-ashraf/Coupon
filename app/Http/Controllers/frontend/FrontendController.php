<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    
    {      
        $product = Product::latest()->first();
        return view('frontend.index', compact('product'));
    }
}
