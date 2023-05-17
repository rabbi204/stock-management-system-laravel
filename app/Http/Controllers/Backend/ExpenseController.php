<?php

namespace App\Http\Controllers\Backend;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
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
     *  show all expense list
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('expense.list')){
            abort(403, 'Sorry!! Unauthorized Access to show expense list');
        }

        $all_expenses = Expense::latest()->get();
        return view('backend.pages.expense.index', compact('all_expenses'));
    }

    /***
     *  create new expense
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('expense.create')){
            abort(403, 'Sorry!! Unauthorized Access to create expense');
        }
        $expense_categories = ExpenseCategory::latest()->get();
        return view('backend.pages.expense.create', compact('expense_categories'));
    }
    /**
     *  store expense data
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('expense.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store expense');
        }

        $request->validate([
            'reference_no' => 'required|unique:expenses,reference_no',
            'exp_cat_id' => 'required',
            'expense_title' => 'required',
            'amount' => 'required',
            'expense_date' => 'required',
            'expense_note' => 'required',
        ]);

        $expense = new Expense();
        $expense->reference_no = $request->reference_no;
        $expense->exp_cat_id = $request->exp_cat_id;
        $expense->expense_title = $request->expense_title;
        $expense->amount = $request->amount;
        $expense->expense_note = trim($request->expense_note);
        $expense->expense_date = date('Y-m-d', strtotime($request->expense_date));
        $expense->save();

        $notification = array(
            'message' => 'Expense Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expense.list')->with($notification);

    }

    /**
     *  expense edit method
     */
    public function edit($id)
    {
       if(is_null($this->user) || !$this->user->can('expense.edit')){
            abort(403, 'Sorry!! Unauthorized Access to edit any expense data');
        }

        $expense_categories = ExpenseCategory::latest()->get();
        $expense = Expense::where('id', $id)->first();

        return view('backend.pages.expense.edit', compact('expense_categories', 'expense'));
    }
    /***
     * expense update method
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('expense.update')){
            abort(403, 'Sorry!! Unauthorized Access to update any expense data');
        }

        $request->validate([
            'exp_cat_id' => 'required',
            'expense_title' => 'required',
            'amount' => 'required',
            'expense_date' => 'required',
            'expense_note' => 'required',
        ]);

        $expense = Expense::where('id', $id)->first();
        
        $expense->exp_cat_id = $request->exp_cat_id;
        $expense->expense_title = $request->expense_title;
        $expense->amount = $request->amount;
        $expense->expense_note = trim($request->expense_note);
        $expense->expense_date = date('Y-m-d', strtotime($request->expense_date));
        $expense->update();

        $notification = array(
            'message' => 'Expense Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expense.list')->with($notification);
    }

    /***
     *  expense delete method
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('expense.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any expense data');
        }

        $data = Expense::where('id', $id)->delete();
        $notification = array(
            'message' => 'Expense Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('expense.list')->with($notification);
    }


}
