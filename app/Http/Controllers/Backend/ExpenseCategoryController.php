<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller
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
     *  index method for expense category
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('expense.category.list')){
            abort(403, 'Sorry!! Unauthorized Access to show expense category list');
        }

        $expense_categories = ExpenseCategory::latest()->get();
        return view('backend.pages.expense.category.index', compact('expense_categories'));
    }
    /**
     *  create method for expense category
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('expense.category.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Expense Category');
        }

        return view('backend.pages.expense.category.create');
    }
    /**
     *  store method for expense category
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('expense.category.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store expense category data');
        }
        
        $request->validate([
            'name' => 'required|unique:expense_categories,name'
        ]);

        // create expense category
        $expense_category = new ExpenseCategory();
        $expense_category->name = $request->name;
        $expense_category->save();

        $notification = array(
            'message' => 'Expense Category Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expense.category.list')->with($notification);
    }
    /**
     *  edit method for expense category
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('expense.category.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Expense Category');
        }
        
        $expense_category = ExpenseCategory::where('id', $id)->first();
        return view('backend.pages.expense.category.edit', compact('expense_category'));
    }
    /**
     *  update method for expense category
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('expense.category.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store expense category data');
        }
        
        $request->validate([
            'name' => 'required|unique:expense_categories,name,' .$id
        ]);

        // update expense category
        $expense_category = ExpenseCategory::where('id', $id)->first();
        $expense_category->name = $request->name;
        $expense_category->update();

        $notification = array(
            'message' => 'Expense Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expense.category.list')->with($notification);
    }
    /**
     *  delete method for expense category
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('expense.category.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $expense_category = ExpenseCategory::where('id', $id)->delete();

        $notification = array(
            'message' => 'Expense Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
