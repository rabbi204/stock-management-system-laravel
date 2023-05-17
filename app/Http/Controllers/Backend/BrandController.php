<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
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
     *  index method for brand
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('brand.list')){
            abort(403, 'Sorry!! Unauthorized Access to show brand list');
        }

        $all_brand = Brand::latest()->get();
        return view('backend.pages.brand.index', compact('all_brand'));
    }
    /**
     *  create method for brand
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('brand.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Brand');
        }

        return view('backend.pages.brand.create');
    }
    /**
     *  store method for brand
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('brand.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store brand data');
        }
        
        $request->validate([
            'name' => 'required|unique:brands,name'
        ]);

        // create brand
        $category = new Brand();
        $category->name = $request->name;
        $category->description = trim($request->description);
        $category->save();

        $notification = array(
            'message' => 'Brand Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
    /**
     *  edit method for brand
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('brand.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Brand');
        }
        
        $brand = Brand::where('id', $id)->first();
        return view('backend.pages.brand.edit', compact('brand'));
    }
    /**
     *  update method for brand
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('brand.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store category data');
        }
        
        $request->validate([
            'name' => 'required|unique:brands,name,' .$id
        ]);

        // update brand
        $brand = Brand::where('id', $id)->first();
        $brand->name = $request->name;
        $brand->description = trim($request->description);
        $brand->update();

        $notification = array(
            'message' => 'Brand Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('brand.list')->with($notification);
    }
    /**
     *  delete method for category
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('brand.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $brand = Brand::where('id', $id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
