<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
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
        if(is_null($this->user) || !$this->user->can('category.list')){
            abort(403, 'Sorry!! Unauthorized Access to show category list');
        }

        $all_categories = Category::latest()->get();
        return view('backend.pages.category.index', compact('all_categories'));
    }
    /**
     *  create method for category
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('category.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Category');
        }

        return view('backend.pages.category.create');
    }
    /**
     *  store method for category
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('category.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store category data');
        }
        
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        // create category
        $category = new Category();
        $category->name = $request->name;
        $category->description = trim($request->description);
        $category->save();

        $notification = array(
            'message' => 'Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.list')->with($notification);
    }
    /**
     *  edit method for category
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('category.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Category');
        }
        
        $category = Category::where('id', $id)->first();
        return view('backend.pages.category.edit', compact('category'));
    }
    /**
     *  update method for category
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('category.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store category data');
        }
        
        $request->validate([
            'name' => 'required|unique:categories,name,'.$id
        ]);

        // update category
        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->description = trim($request->description);
        $category->update();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('category.list')->with($notification);
    }
    /**
     *  delete method for category
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('category.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $category = Category::where('id', $id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
