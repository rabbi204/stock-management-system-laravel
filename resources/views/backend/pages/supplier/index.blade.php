@extends('backend.layouts.admin_master')

@section('title')
    STMS | Supplier List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Suppliers List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Suppliers</li>
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
                    <h4 class="card-title ">Suppliers List</h4>
                    @if (Auth::guard('admin')->user()->can('supplier.create'))
                    <a href="{{ route('supplier.create') }}" class="btn btn-primary">New Supplier</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="15%">Name</th>
                                <th width="20%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="20%">Address</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td class="d-flex justify-content-start">

                                    @if (Auth::guard('admin')->user()->can('supplier.edit'))
                                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning" title="Edit" ><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('supplier.delete'))
                                    <a href="{{ route('supplier.delete', $supplier->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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