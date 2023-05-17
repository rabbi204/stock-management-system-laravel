<?php

namespace App\Http\Controllers\Backend;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
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
     *  index method for category
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('sub.category.list')){
            abort(403, 'Sorry!! Unauthorized Access to show category list');
        }

        $all_sub_categories = SubCategory::latest()->get();
        return view('backend.pages.sub_category.index', compact('all_sub_categories'));
    }
    /**
     *  create method for category
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('sub.category.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Category');
        }

        $all_categories = Category::latest()->get();
        return view('backend.pages.sub_category.create', compact('all_categories'));
    }
    /**
     *  store method for category
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('sub.category.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store category data');
        }
        
        $request->validate([
            'name' => 'required|unique:sub_categories,name',
            'category_id' => 'required'
        ]);

        // create category
        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->description = trim($request->description);
        $sub_category->save();

        $notification = array(
            'message' => 'SubCategory Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('sub.category.list')->with($notification);
    }
    /**
     *  edit method for category
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('sub.category.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Category');
        }
        
        $all_categories = Category::latest()->get();
        $sub_category = SubCategory::where('id', $id)->first();
        return view('backend.pages.sub_category.edit', compact('all_categories', 'sub_category'));
    }
    /**
     *  update method for category
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('sub.category.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store sub category data');
        }
        
        $request->validate([
            'name' => 'required|unique:sub_categories,name,'.$id,
            'category_id' => 'required'
        ]);

        // update category
        $sub_category = SubCategory::where('id', $id)->first();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->description = trim($request->description);
        $sub_category->update();

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('sub.category.list')->with($notification);
    }
    /**
     *  delete method for category
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('sub.category.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $subcategory = SubCategory::where('id', $id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
