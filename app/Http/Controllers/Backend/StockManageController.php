<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StockManageController extends Controller
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
     *  product stock list
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('product.stock.list')){
            abort(403, 'Sorry!! Unauthorized Access to show product stock list');
        }

        $all_product = Product::with('getCategory', 'getSubCategory', 'getSupplier','getBrand')
                        ->orderBy('updated_at', 'desc')->get();

        return view('backend.pages.stock_manage.index', compact('all_product'));
    }

    /**
     *  stock manage page
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('product.stock.add')){
            abort(403, 'Sorry!! Unauthorized Access to add product stock');
        }

        $all_category = Category::all();
        return view('backend.pages.stock_manage.create', compact('all_category'));
    }
    /**
     *  get category wise product
     */
    public function getProduct($id)
    {
        $data = DB::table('products')->where('category_id', $id)->get();
        // dd($data);
        return response()->json(['data'=>$data]);
    }
    /**
     *  get product details
     */
    public function getProductDetails($id)
    {
        $data = DB::table('products')->where('id', $id)->get();
        // dd($data);
        return response()->json(['data'=>$data]);
    }
    /***
     *  product stock update. here stock = total_quantity in product table
     */
    public function update(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('product.stock.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update product stock');
        }

        $product_id = $request->product_id;

        $product = Product::where('id', $product_id)->first();

        if($request->adjustment_type == "Add"){
            $product->total_quantity = $product->total_quantity + $request->stock_quantity;
            $product->update();
        }
        if($request->adjustment_type == "Subtract"){
            $product->total_quantity = $product->total_quantity - $request->stock_quantity;
            $product->update();
        }

        $notification = array(
            'message' => 'Stock Added',
            'alert-type' => 'success'
        );
        return redirect()->route('product.stock.list')->with($notification);
        
    }


}
