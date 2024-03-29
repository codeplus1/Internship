<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $productController; // Define a property to hold an instance of the ProductController

    public function __construct(ProductController $productController)
    {
        $this->productController = $productController;
    }

    public function home(){
        // Call the index method of the ProductController to fetch products
        $products = $this->productController->total();
        $total_product = count($products);
        // Calculate other totals as needed
        $total_inventory = Inventory::count(); // Assuming inventory count is not retrieved from ProductController

        return view('frontend.home', compact('total_product', 'total_inventory', 'products'));
    }
}
