<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    
    /**
     * index method
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('admin.dashboard')){
            abort(403, 'Sorry!! Unauthorized Access to Show Dashboard');
        }

        $total_customer = Customer::count();
        $total_product = Product::count();
        $total_supplier = Supplier::count();
        $total_order = Order::count();
        
        //stock alert
        $stock_alert = Product::with('getCategory','getSubCategory','getSupplier','getBrand')
                    ->where('total_quantity', '<=', 10)
                    ->get();
        return view('backend.pages.dashboard.index', compact('total_customer','total_product', 'total_supplier','total_order','stock_alert'));
    }
}
