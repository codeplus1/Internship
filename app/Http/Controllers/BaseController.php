<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function home(){
        $total_product = Product::count();
        $total_inventory = Inventory::count();
        return view('frontend.home',compact( 'total_product', 'total_inventory'));
    }
}
