<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('role.list')){
            abort(403, 'Sorry!! Unauthorized Access to Show Role List');
        }
        
        $roles = Role::all();
        return view('backend.pages.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('role.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Role');
        }
        
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        // dd($permission_groups);
        return view('backend.pages.roles.create', compact('all_permissions', 'permission_groups')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('role.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store Role Data');
        }
        
        // validation data
        $request->validate([
            'name' => 'required|unique:roles,name',
        ],[
            'name.required' => 'Please Give Role Name',
        ]);

        //Process Data
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        $permissions = $request->input('permissions');
        
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message'   => 'Role Created Successfully',
            'alert-type'    => 'success',
        );
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('role.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Role Data');
        }
        
        $role = Role::find($id);
        $all_permissions = Permission::all();
        $permission_groups = Admin::getpermissionGroups();
        // dd($permission_groups);
        return view('backend.pages.roles.edit', compact('role','all_permissions', 'permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('role.update')){
            abort(403, 'Sorry!! Unauthorized Access to Update Role Data');
        }
        
        // validation data
        $request->validate([
            'name' => 'required|unique:roles,name,'.$id
        ],[
            'name.required' => 'Please Give Role Name',
        ]);

        //Process Data
        $role = Role::findById($id, 'admin');
        $permissions = $request->input('permissions');
        
        if(!empty($permissions)){
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        $notification = array(
            'message'   => 'Role Upadated Successfully',
            'alert-type'    => 'success',
        );
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null($this->user) || !$this->user->can('role.delete')){
            abort(403, 'Sorry!! Unauthorized Access to Delete Any Role');
        }
        
        $role = Role::findById($id, 'admin');

        $role = Role::find($id);
        if(!is_null($role)){
            $role->delete();
        }

        $notification = array(
            'message'   => 'Role Deleted Successfully',
            'alert-type'    => 'success',
        );
        return redirect()->route('roles.index')->with($notification);
    }
}
