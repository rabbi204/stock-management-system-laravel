<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * add to cart
     */
    public function index(Request $request)
    {
       $data = array();
       $data['id'] = $request->id;
       $data['name'] = $request->name;
       $data['qty'] = $request->qty;
       $data['price'] = $request->price;
       $data['weight'] = $request->weight;

    //    echo "<pre>";
    //    print_r($data);

        $add = Cart::add($data);

        if ($add) {
            $notification = array(
                'message' => 'Cart Added Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cart Not Added',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    /**
     *  cart qty update
     */
    public function cartQtyUpdate(Request $request, $rowId)
    {
        // $qty = $request->qty;
        // $update_qty_cart = Cart::update($rowId, $qty);

        $update_qty_cart = Cart::update($rowId, ['qty' => $request->qty]); // Will update the quantiy;;

        if ($update_qty_cart) {
            $notification = array(
                'message' => 'Cart Qty Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cart Qty Failed Added',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    /**
     *  cart price update
     */
    public function cartPriceUpdate(Request $request, $rowId)
    {
        // $price = $request->price;

        // $update_price_cart = Cart::update($rowId, $price);

        $update_price_cart = Cart::update($rowId, ['price' => $request->price]); // Will update the price;

        if ($update_price_cart) {
            $notification = array(
                'message' => 'Cart Price Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Cart Price Failed Added',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
    /**
     *  remove cart
     */
    public function cartRemove($rowId)
    {
        $remove = Cart::remove($rowId);

        if ($remove) {
            $notification = array(
                'message' => 'Successfully Cart Removed',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Failed to Remove Cart',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /***
     *  INVOICE Create
     */
    public function createInvoice(Request $request)
    {
        $request->validate([
            'customer_id' => 'required'
        ],[
            'customer_id.required' => "Please Select a Customer"
        ]);

        $customer_id = $request->customer_id;
        $customer = Customer::where('id', $customer_id)->first();

        // dd($customer);

        $contents = Cart::content();

        return view('backend.pages.pos.invoice', compact('customer', 'contents'));

        // echo "<pre>";
        // print_r($contents);
        // echo "<br>";
        // print_r($customer_id);
    }

    /***
     *  final invoice
     */
    public function finalInvoice(Request $request)
    {
        // $request->validate([
        //     'payment_status' => 'required'
        // ],[
        //     'payment_status.required' => "Please Select Payment Status"
        // ]);

        // $data = array();
        // $data['customer_id'] = $request->customer_id;
        // $data['order_date'] = $request->order_date;
        // $data['order_status'] = $request->order_status;
        // $data['total_products'] = $request->total_products;
        // $data['sub_total'] = $request->sub_total;
        // $data['vat'] = $request->vat;
        // $data['total'] = $request->total;
        // $data['payment_status'] = $request->payment_status;
        // $data['pay'] = $request->pay;
        // $data['due'] = $request->due;


        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->order_date = $request->order_date;
        $order->order_status = $request->order_status;
        $order->total_products = $request->total_products;
        $order->sub_total = $request->sub_total;
        $order->vat = $request->vat;
        $order->total = $request->total;
        $order->payment_status = $request->payment_status;
        $order->pay = $request->pay;
        $order->due = $request->due;
        $order->save();

        //data save in order table
        // $order_id = DB::table('orders')->insertGetId($data);

        $contents = Cart::content();

        // $old_data= array();

        foreach($contents as $content){
            // $old_data['order_id'] = $order_id;
            // $old_data['product_id'] = $content->id;
            // $old_data['quantity'] = $content->qty;
            // $old_data['price'] = $content->price;
            // $old_data['total'] = $content->total;
            // //insert data into order details table
            // $insert = DB::table('order_details')->insert($old_data);


            $order->id;
            $orderDetails = new OrderDetails();
            $orderDetails->order_id = $order->id ;
            $orderDetails->product_id = $content->id;
            $orderDetails->quantity = $content->qty;
            $orderDetails->price = $content->price;
            $orderDetails->total =$content->total;
            $insert = $orderDetails->save();


            // $stock = Product::where('product', $order->product)->first();

            // stock update
            DB::table('products')
                -> where('id',$content->id)
                -> update(['total_quantity' => DB::raw('total_quantity - ' . $content ->qty)]);
                // -> update(['product_quantity' => DB::raw('product_quantity - ' . $content ->qty)]);

        }


        if ($insert) {
            $notification = array(
                'message' => 'Successfully Invoice Created',
                'alert-type' => 'success'
            );
            // destroy cart
            Cart::destroy();
            return redirect()->route('pos.index')->with($notification);
        }else{
            $notification = array(
                'message' => 'Failed to Remove Cart',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        // echo "<pre>";
        // print_r($data);
        // echo "<br>";
        // print_r($customer_id);

    }
}
