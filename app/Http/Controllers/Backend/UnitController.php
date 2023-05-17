<?php

namespace App\Http\Controllers\Backend;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
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
     *  index method for unit
     */
    public function index()
    {
        if(is_null($this->user) || !$this->user->can('unit.list')){
            abort(403, 'Sorry!! Unauthorized Access to show unit list');
        }

        $all_units = Unit::latest()->get();
        return view('backend.pages.unit.index', compact('all_units'));
    }
    /**
     *  create method for unit
     */
    public function create()
    {
        if(is_null($this->user) || !$this->user->can('unit.create')){
            abort(403, 'Sorry!! Unauthorized Access to Create Unit');
        }

        return view('backend.pages.unit.create');
    }
    /**
     *  store method for unit
     */
    public function store(Request $request)
    {
        if(is_null($this->user) || !$this->user->can('unit.store')){
            abort(403, 'Sorry!! Unauthorized Access to Store unit data');
        }
        
        $request->validate([
            'unit_name' => 'required|unique:units,unit_name',
            'unit_short_name' => 'required',
            'unit_value' => 'required'
        ]);

        // create unit
        $unit = new Unit();
        $unit->unit_name = $request->unit_name;
        $unit->unit_short_name = $request->unit_short_name;
        $unit->unit_value = $request->unit_value;
        $unit->description = trim($request->description);
        $unit->save();

        $notification = array(
            'message' => 'Unit Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('unit.list')->with($notification);
    }
    /**
     *  edit method for unit
     */
    public function edit($id)
    {
        if(is_null($this->user) || !$this->user->can('unit.edit')){
            abort(403, 'Sorry!! Unauthorized Access to Edit Unit');
        }
        
        $unit = Unit::where('id', $id)->first();
        return view('backend.pages.unit.edit', compact('unit'));
    }
    /**
     *  update method for unit
     */
    public function update(Request $request, $id)
    {
        if(is_null($this->user) || !$this->user->can('unit.update')){
            abort(403, 'Sorry!! Unauthorized Access to Store unit data');
        }
        
        $request->validate([
            'unit_name' => 'required|unique:units,unit_name,'.$id,
            'unit_short_name' => 'required',
            'unit_value' => 'required'
        ]);

        // update unit
        $unit = Unit::where('id', $id)->first();
        $unit->unit_name = $request->unit_name;
        $unit->unit_short_name = $request->unit_short_name;
        $unit->unit_value = $request->unit_value;
        $unit->description = trim($request->description);
        $unit->update();

        $notification = array(
            'message' => 'Unit Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('unit.list')->with($notification);
    }
    /**
     *  delete method for unit
     */
    public function delete($id)
    {
        if(is_null($this->user) || !$this->user->can('unit.delete')){
            abort(403, 'Sorry!! Unauthorized Access to delete any data');
        }

        $unit = Unit::where('id', $id)->delete();

        $notification = array(
            'message' => 'Unit Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
