@extends('backend.layouts.admin_master')

@section('title')
    STMS | Customer List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Customers List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Customers</li>
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
                    <h4 class="card-title ">Customers List</h4>
                    @if (Auth::guard('admin')->user()->can('customer.create'))
                    <a href="{{ route('customer.create') }}" class="btn btn-primary">New Customer</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="7%">Photo</th>
                                <th width="15%">Name</th>
                                <th width="15%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="10%">NID</th>
                                <th width="20%">Address</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_customers as $customer)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <img src="{{ (!empty($customer->photo)) ? url("upload/images/customer_images/".$customer->photo) : url('upload/no_image.jpg') }}" alt="" style="height: 70px; width:70px; border-radius:50%;">
                                </td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->nid }}</td>
                                <td>{{ $customer->address }}</td>

                                <td class="d-flex justify-content-start">
                                    
                                    {{-- @if (Auth::guard('admin')->user()->can('customer.details'))
                                    <a href="{{ route('customer.details', $customer->id) }}" class="btn btn-success" title="Details"><i class="fa fa-eye"></i></a>
                                    @endif --}}

                                    @if (Auth::guard('admin')->user()->can('customer.edit'))
                                        <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning" title="Edit" ><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('customer.delete'))
                                    <a href="{{ route('customer.delete', $customer->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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