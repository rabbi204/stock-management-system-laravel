<?php

namespace App\Http\Controllers\Backend;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
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
     *  index method
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('supplier.list')){
            abort(403, 'Sorry!! Unauthorized Access to show supplier list');
        }

        $suppliers = Supplier::all();
        return view('backend.pages.supplier.index', compact('suppliers'));
    }
    /**
     *  create method
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('supplier.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create new supplier');
        }
        return view('backend.pages.supplier.create');
    }
    /**
     *  store method
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('supplier.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store supplier data');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:100|unique:suppliers,email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);

        // create new supplier
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->save();

        $notification = array(
            'message' => 'Supplier Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('supplier.list')->with($notification);
    }
    /**
     *  edit method
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('supplier.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Supplier Data');
        }
        
        $supplier = Supplier::where('id', $id)->first();
        return view('backend.pages.supplier.edit', compact('supplier'));
    }
    /**
     *  edit method
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('supplier.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update Supplier Data');
        }
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:100|unique:suppliers,email,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:suppliers,phone,'.$id,
        ]);

        // create new supplier
        $supplier = Supplier::where('id',$id)->first();

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->update();

        $notification = array(
            'message' => 'Supplier has been updated',
            'alert-type' => 'info'
        );
        return redirect()->route('supplier.list')->with($notification);
    }
    /**
     *  edit method
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('supplier.delete')){
            abort(403, 'Sorry!! Unauthorized Access to Delete Supplier Data');
        }
        
        $supplier = Supplier::where('id',$id)->first();
        if (!is_null($supplier)) {
            $supplier->delete();
        }

        $notification = array(
            'message' => 'Supplier deleted successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
}
