<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
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
        if(is_null($this->user) || !$this->user->can('admin.list')){
            abort(403, 'Sorry!! Unauthorized Access to show admin list');
        }

        $users = Admin::all();
        return view('backend.pages.admin.index', compact('users'));
    }
    /**
     *  create method
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('admin.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create new admin');
        }

        $roles = Role::all();
        return view('backend.pages.admin.create', compact('roles'));
    }
    /**
     *  store method
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('admin.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store admin data');
        }
        
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|max:100|unique:admins,email',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'password' => 'required|min:4',
        ]);

        // create new admin
        $admin = new Admin();

        //admin profile image upload
        if($request->file('photo')){
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image ->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('upload/images/admin_profile_images/'.$name_gen);
            $admin->photo = $name_gen;
        }


        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->nid = $request->nid;
        $admin->address = $request->address;
        $admin->birth_date = $request->birth_date;
        $admin->register_date = $request->register_date;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if($request->roles){
            $admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    /**
     *  edit method
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Admin Data');
        }
        
        $user = Admin::where('id', $id)->first();
        $roles = Role::all();
        return view('backend.pages.admin.edit', compact('user', 'roles'));
    }
    /**
     *  edit method
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('admin.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update Admin Data');
        }
        
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|max:100|unique:admins,email,'.$id,
            'phone' => 'required|regex:/(01)[0-9]{9}/'
        ]);

        // create new admin
        $admin = Admin::where('id',$id)->first();

        //admin profile image upload
        if($request->hasFile('photo')){
            @unlink('upload/images/admin_profile_images/'.$admin->photo);
            $image = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$image ->getClientOriginalExtension();
            Image::make($image)->resize(400,400)->save('upload/images/admin_profile_images/'.$name_gen);
            $admin->photo = $name_gen;
        }

        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->nid = $request->nid;
        $admin->address = $request->address;
        $admin->birth_date = $request->birth_date;
        $admin->register_date = $request->register_date;
        
        if($request->password){
            $admin->password = Hash::make($request->password);
        }
        
        $admin->update();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin has been updated',
            'alert-type' => 'info'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    /**
     *  edit method
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.delete')){
            abort(403, 'Sorry!! Unauthorized Access to Delete Admin Data');
        }
        
        $admin = Admin::where('id',$id)->first();
        if (!is_null($admin)) {
            $admin->delete();
        }

        $notification = array(
            'message' => 'Admin deleted successfull',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }
    /**
     *  details page
     */
    public function details($id)
    {
        if(is_null($this->user) || !$this->user->can('admin.details')){
            abort(403, 'Sorry!! Unauthorized Access to Show Details Data');
        }

        $user = Admin::where('id',$id)->first();
        return view('backend.pages.admin.details', compact('user'));
    }
    /**
     *  details page
     */
    public function adminProfile()
    {
        // if(is_null($this->user) || !$this->user->can('admin.profile')){
        //     abort(403, 'Sorry!! Unauthorized Access to Show Profile Data');
        // }

        $id = Auth::guard('admin')->user()->id;

        $user = Admin::where('id',$id)->first();
        return view('backend.pages.admin.profile', compact('user'));
    }
}
