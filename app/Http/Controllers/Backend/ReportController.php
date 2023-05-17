<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use App\Models\Expense;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
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
     *  sales report 
     */
    public function salesReport()
    {
        if(is_null($this->user) || !$this->user->can('sales.report')){
            abort(403, 'Sorry!! Unauthorized Access to Show Sales Report');
        }
        return view('backend.pages.reports.sales_report');
    }

    /**
     *  sales report search between two date
     */
    public function getSalesSearchData(Request $request)
    {
        if($request->ajax()){
            if($request->from_date != '' && $request->to_date != ''){
                $start_date = date('Y-m-d', strtotime($request->from_date));
                $end_date = date('Y-m-d', strtotime($request->to_date));

                // dd($start_date,$end_date,$request->from_date, $request->to_date);

                $data = Order::with('get_customer')
                        ->whereBetween('order_date', array($start_date, $end_date))
                        ->get();
            }else{
                $data = Order::with('get_customer')
                        ->orderBy('order_date', 'desc')
                        ->get();
            }

            echo json_encode($data);
            // DB::table('orders')
        }
    }

    /**
     * show purchase report page
     */
    public function purchaseReport()
    {
        if(is_null($this->user) || !$this->user->can('purchase.report')){
            abort(403, 'Sorry!! Unauthorized Access to show Purchase Report');
        }

        return view('backend.pages.reports.purchase_report');
    }

    /**
     *  purchase report search between two date
     */
    public function getPurchaseSearchData(Request $request)
    {
        if($request->ajax()){
            if($request->from_date != '' && $request->to_date != ''){

                $start_date = date('Y-m-d', strtotime($request->from_date));
                $end_date = date('Y-m-d', strtotime($request->to_date));

                $data = Purchase::with('getSupplierName','getBrandName')
                        ->whereBetween('purchase_date', array($start_date, $end_date))
                        ->get();
            }else{
                $data = Purchase::with('getSupplierName','getBrandName')
                        ->orderBy('purchase_date', 'desc')
                        ->get();
            }

            echo json_encode($data);
            // DB::table('orders')
            // ::with('getSupplierName,getBrandName')
            //             ->
        }
    }

    /**
     *  show expense report page
     */
    public function expenseReport()
    {
        if(is_null($this->user) || !$this->user->can('expense.report')){
            abort(403, 'Sorry!! Unauthorized Access to Show Expense Report');
        }

        return view('backend.pages.reports.expense_report');
    }

    /**
     *  expense report search between two date
     */
    public function getExpenseSearchData(Request $request)
    {
        if($request->ajax()){
            if($request->from_date != '' && $request->to_date != ''){

                $start_date = date('Y-m-d', strtotime($request->from_date));
                $end_date = date('Y-m-d', strtotime($request->to_date));

                $data = Expense::with('getExpenseCategoriesName')
                        ->whereBetween('expense_date', array($start_date, $end_date))
                        ->get();
            }else{
                $data = Expense::with('getExpenseCategoriesName')
                        ->orderBy('expense_date', 'desc')
                        ->get();
            }

            echo json_encode($data);
            
        }
    }

}
