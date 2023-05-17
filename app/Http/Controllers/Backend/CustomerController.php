<?php

namespace App\Http\Controllers\Backend;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
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
        if(is_null($this->user) || !$this->user->can('customer.list')){
            abort(403, 'Sorry!! Unauthorized Access to show customer list');
        }

        $all_customers = Customer::latest()->get();
        return view('backend.pages.customer.index', compact('all_customers'));
    }
    /**
     *  create method
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('customer.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create new customer');
        }
        return view('backend.pages.customer.create');
    }
    /**
     *  store method
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('customer.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store customer data');
        }
        
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:customers,phone',
        ]);

        // create new customer
        $customer = new Customer();

        //customer profile image upload
        if($request->file('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image ->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('upload/images/customer_images/'.$name_gen);
            $customer->photo = $name_gen;
        }


        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->nid = $request->nid;
        $customer->address = $request->address;
        $customer->save();

        $notification = array(
            'message' => 'Customer Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    /**
     *  edit method
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('customer.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Customer Data');
        }
        
        $customer = Customer::where('id', $id)->first();
        return view('backend.pages.customer.edit', compact('customer'));
    }
    /**
     *  edit method
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('customer.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update Customer Data');
        }
        
        $request->validate([
            'name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:customers,phone,'.$id,
        ]);

        // create new customer
        $customer = Customer::where('id',$id)->first();

        //customer profile image upload
        if($request->hasFile('photo')){
            @unlink('upload/images/customer_images/'.$customer->photo);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image ->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('upload/images/customer_images/'.$name_gen);
            $customer->photo = $name_gen;
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->nid = $request->nid;
        $customer->address = $request->address;
        $customer->update();

        $notification = array(
            'message' => 'Customer has been updated',
            'alert-type' => 'info'
        );
        return redirect()->route('customer.list')->with($notification);
    }
    /**
     *  edit method
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('customer.delete')){
            abort(403, 'Sorry!! Unauthorized Access to Delete Customer Data');
        }
        
        $customer = Customer::where('id',$id)->first();
        if (!is_null($customer)) {
            $customer->delete();
        }

        $notification = array(
            'message' => 'Customer deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
}
