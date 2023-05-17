<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    // public $user;
    // public function __construct()
    // {
    //     $this->middleware(function($request, $next){
    //         $this->user = Auth::guard('admin')->user();
    //         return $next($request);
    //     });
    // }


    /**
     *  index method for product
     */
    public function index()
    {
        // if(is_null($this->user) || !$this->user->can('product.list')){
        //     abort(403, 'Sorry!! Unauthorized Access to show product list');
        // }

        $all_category = Category::latest()->get();
        $all_product = Product::latest()->get();
        $all_customer = Customer::latest()->get();
        return view('backend.pages.pos.index', compact('all_category','all_product', 'all_customer'));
    }
}
