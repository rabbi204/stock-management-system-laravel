<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
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
     *  sales list show
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('sales.list')){
            abort(403, 'Sorry!! Unauthorized Access to Show Sales List');
        }

        $all_orders = Order::with('get_customer')->orderBy('id', 'desc')->get();
        
        return view('backend.pages.sales.index', compact('all_orders'));
    }
    /***
     *  sales details 
     */
    public function salesDetails($id)
    {
        if(is_null($this->user) || !$this->user->can('sales.details')){
            abort(403, 'Sorry!! Unauthorized Access to Sales Details');
        }
                
        //get order details with product info from OrderDetails table
        // $order = DB::table('order_details')
        //         -> join('products', 'order_details.product_id', 'products.id')
        //         -> where('order_details.order_id', $id)
        //         -> select('products.product_name', 'products.unit_type', 'products.product_weight', 'order_details.*')
        //         -> get();      
        
        //get full order info from Order table
        $order = Order::where('id', $id)
                ->with('get_customer','orderDetails', 'orderDetails.product')
                ->get();

        // dd($order);        
        return view('backend.pages.sales.sales_details', compact('order'));

    }
    /**
     * sales delete
     */
    public function salesDelete($id)
    {
        if(is_null($this->user) || !$this->user->can('sales.delete')){
            abort(403, 'Sorry!! Unauthorized Access to Delete any data');
        }

        $order = Order::where('id',$id)->first();
        if (!is_null($order)) {
            $order->delete();
        }

        $notification = array(
            'message' => 'Order Data deleted successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
