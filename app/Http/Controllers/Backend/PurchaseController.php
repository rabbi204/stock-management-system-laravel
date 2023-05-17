<?php

namespace App\Http\Controllers\Backend;

use App\Models\Purchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
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
     *  index method for purchase
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('purchase.list')){
            abort(403, 'Sorry!! Unauthorized Access to show purchase list');
        }

        $all_purchases = Purchase::latest()->get();
        return view('backend.pages.purchase.index', compact('all_purchases'));
    }
    /**
     *  create method for purchase
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('purchase.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Purchase');
        }
        $all_suppliers = Supplier::latest()->get();
        $all_brands = Brand::latest()->get();
        $all_units = Unit::latest()->get();
        return view('backend.pages.purchase.create', compact('all_suppliers', 'all_brands', 'all_units'));
    }
    /**
     *  store method for purchase
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('purchase.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store purchase data');
        }
        
        $request->validate([
            'reference_no' => 'required|unique:purchases,reference_no',
            'purchase_date' => 'required',
            'product_name' => 'required',
            'unit_type' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
            'number_of_packet' => 'required',
            'supplier_id' => 'required',
            'brand_id' => 'required',
        ]);

        // create purchase
        $purchase = new Purchase();
        $purchase->reference_no = $request->reference_no;
        $purchase->purchase_date = date('Y-m-d', strtotime($request->purchase_date));
        $purchase->product_name = $request->product_name;
        $purchase->unit_type = $request->unit_type;
        $purchase->product_quantity = $request->product_quantity;
        $purchase->product_weight = $request->product_weight;
        $purchase->number_of_packet = $request->number_of_packet;
        $purchase->total_quantity = $request->product_quantity * $request->number_of_packet;

        //calculate total quantity
        // if($request->unit_id == "KG"){
        //     $purchase->total_quantity = $request->product_quantity * 1000;
        // }
        // if($request->unit_id == "PC"){
        //     $purchase->total_quantity = $request->product_quantity * 1000;
        // }

        $purchase->supplier_id = $request->supplier_id;
        $purchase->brand_id = $request->brand_id;
        $purchase->save();

        $notification = array(
            'message' => 'Purchase Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.list')->with($notification);
    }
    /**
     *  edit method for purchase
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('purchase.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Purchase');
        }
        
        $purchase = Purchase::where('id', $id)->first();

        $all_suppliers = Supplier::latest()->get();
        $all_brands = Brand::latest()->get();
        $all_units = Unit::latest()->get();

        return view('backend.pages.purchase.edit', compact('purchase', 'all_suppliers', 'all_brands', 'all_units'));
    }
    /**
     *  update method for purchase
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('purchase.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store purchase data');
        }
        
        $request->validate([
            'purchase_date' => 'required',
            'product_name' => 'required',
            'unit_type' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
            'number_of_packet' => 'required',
            'supplier_id' => 'required',
            'brand_id' => 'required',
        ]);
        // update purchase
        $purchase = Purchase::where('id', $id)->first();
        
        $purchase->purchase_date = date('Y-m-d', strtotime($request->purchase_date));
        $purchase->product_name = $request->product_name;
        $purchase->unit_type = $request->unit_type;
        $purchase->product_quantity = $request->product_quantity;
        $purchase->product_weight = $request->product_weight;
        $purchase->number_of_packet = $request->number_of_packet;
        $purchase->total_quantity = $request->product_quantity * $request->number_of_packet;

        //calculate total quantity
        // if($request->unit_id == "KG"){
        //     $purchase->total_quantity = $request->product_quantity * 1000;
        // }
        // if($request->unit_id == "PC"){
        //     $purchase->total_quantity = $request->product_quantity * 1;
        // }

        $purchase->supplier_id = $request->supplier_id;
        $purchase->brand_id = $request->brand_id;
        $purchase->update();

        $notification = array(
            'message' => 'Purchase Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.list')->with($notification);
    }
    /**
     *  delete method for purchase
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('purchase.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $purchase = Purchase::where('id', $id)->delete();

        $notification = array(
            'message' => 'Purchase Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
