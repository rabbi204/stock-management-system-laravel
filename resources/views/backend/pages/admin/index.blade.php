@extends('backend.layouts.admin_master')

@section('title')
    STMS | User List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Users List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Users</li>
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
                    <h4 class="card-title ">Users List</h4>
                    @if (Auth::guard('admin')->user()->can('admin.create'))
                    <a href="{{ route('admin.create') }}" class="btn btn-primary">New User</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="5%">Photo</th>
                                <th width="15%">Full Name</th>
                                <th width="20%">Email</th>
                                <th width="15%">Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ (!empty($user->photo)) ? url("upload/images/admin_profile_images/".$user->photo) : url('upload/no_image.jpg') }}" alt="" style="height: 70px; width:70px; border-radius:50%;">
                                </td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-pill badge-soft-primary mb-2 font-size-14">{{ $role->name }}</span>   
                                    @endforeach
                                </td>
                                <td class="d-flex justify-content-start">
                                    
                                    @if (Auth::guard('admin')->user()->can('admin.details'))
                                    <a href="{{ route('admin.details', $user->id) }}" class="btn btn-success" title="Details"><i class="fa fa-eye"></i></a>
                                    @endif

                                    @if (Auth::guard('admin')->user()->can('admin.edit'))
                                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-warning" style="margin-left: 3px" title="Edit" ><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('admin.delete'))
                                    <a href="{{ route('admin.delete', $user->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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