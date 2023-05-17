@extends('backend.layouts.admin_master')

@section('title')
    STMS | Role Manage
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Roles Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Roles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Role List</h4>
                    @if (Auth::guard('admin')->user()->can('role.edit'))
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">New Role</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Role Name</th>
                                <th width="70%">Permissions</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $perm)
                                        {{-- <span class="btn btn-primary btn-rounded text-light mr-2 mb-2">{{ $perm->name }}</span>    --}}
                                        <span class="badge badge-pill badge-soft-primary mb-2 font-size-14">{{ $perm->name }}</span>   
                                    @endforeach
                                </td>
                                <td class="d-flex">
                                    @if (Auth::guard('admin')->user()->can('role.edit'))
                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('role.delete'))
                                        <a href="{{ route('roles.destroy',$role->id) }}" class="btn btn-danger" style="margin-left: 3px"  onclick=" event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy',$role->id) }}" method="POST" style="display: none">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    

</div>
@endsection

@section('scripts')
    
@endsection