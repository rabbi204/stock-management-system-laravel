<?php

namespace App\Http\Controllers\Backend;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
     *  index method for product
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('product.list')){
            abort(403, 'Sorry!! Unauthorized Access to show product list');
        }

        // $all_purchases = Product::latest()->get();
        $all_product = Product::with('getCategory', 'getSubCategory', 'getSupplier','getBrand')
                        ->latest()->get();

        return view('backend.pages.product.index', compact('all_product'));
    }
    /**
     *  create method for product
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('product.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Product');
        }
        $all_category = Category::latest()->get();
        $all_sub_category = SubCategory::latest()->get();
        $all_suppliers = Supplier::latest()->get();
        $all_brands = Brand::latest()->get();
        $all_units = Unit::latest()->get();
        return view('backend.pages.product.create', compact('all_category','all_sub_category','all_suppliers', 'all_brands', 'all_units'));
    }
    /**
     *  store method for product
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('product.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store product data');
        }

        $request->validate([
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'product_name' => 'required',
            'unit_type' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
            'number_of_packet' => 'required',
        ]);

        // create product
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_name = $request->product_name;
        $product->unit_type = $request->unit_type;
        $product->product_quantity = $request->product_quantity;
        $product->product_weight = $request->product_weight;
        $product->number_of_packet = $request->number_of_packet;
        // $product->total_quantity = $request->product_quantity * $request->number_of_packet;

        if ($request->unit_type == "KG" || $request->unit_type == "kg") {
            $product->total_quantity = $request->product_quantity * 1;
        }
        if ($request->unit_type == "Box" || $request->unit_type == "box") {
            $product->total_quantity = $request->product_quantity * 12;
        }
        if ($request->unit_type == "Bag" || $request->unit_type == "bag") {
            $product->total_quantity = $request->product_quantity * 50;
        }
        if ($request->unit_type == "Pieces" || $request->unit_type == "Pieces") {
            $product->total_quantity = $request->product_quantity * 1;
        }

        $product->save();

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }
    /**
     *  edit method for product
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('product.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Product');
        }

        $product = Product::where('id', $id)->first();

        $all_category = Category::latest()->get();
        $all_sub_category = SubCategory::latest()->get();
        $all_suppliers = Supplier::latest()->get();
        $all_brands = Brand::latest()->get();
        $all_units = Unit::latest()->get();

        return view('backend.pages.product.edit', compact("product",'all_category','all_sub_category','all_suppliers', 'all_brands', 'all_units'));
    }
    /**
     *  update method for product
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('product.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store product data');
        }

        // $request->validate([
        //     'category_id' => 'required',
        //     'sub_category_id' => 'required',
        //     'brand_id' => 'required',
        //     'supplier_id' => 'required',
        //     'product_name' => 'required',
        //     'unit_type' => 'required',
        //     'product_quantity' => 'required',
        //     'product_weight' => 'required',
        //     'number_of_packet' => 'required',
        // ]);

        // update product
        $product = Product::where('id', $id)->first();

        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_name = $request->product_name;
        $product->unit_type = $request->unit_type;
        $product->product_quantity = $request->product_quantity;
        $product->product_weight = $request->product_weight;
        $product->number_of_packet = $request->number_of_packet;
        // $product->total_quantity = $request->product_quantity * $request->number_of_packet;

        if ($request->unit_type == "KG" || $request->unit_type == "kg") {
            $product->total_quantity = $request->product_quantity * 1;
        }
        if ($request->unit_type == "Box" || $request->unit_type == "box") {
            $product->total_quantity = $request->product_quantity * 12;
        }
        if ($request->unit_type == "Bag" || $request->unit_type == "bag") {
            $product->total_quantity = $request->product_quantity * 50;
        }
        if ($request->unit_type == "Pieces" || $request->unit_type == "Pieces") {
            $product->total_quantity = $request->product_quantity * 1;
        }

        $product->update();

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('product.list')->with($notification);
    }
    /**
     *  delete method for product
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('product.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $product = Product::where('id', $id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
