@extends('backend.layouts.admin_master')

@section('title')
    STMS | Sales List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Sales List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Sales</li>
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
                    <h4 class="card-title ">Sales List</h4>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Invoice ID</th>
                                <th width="10%">Order Date</th>
                                <th width="10%">Customer</th>
                                <th width="10%">Total Items</th>
                                <th width="10%">Amount</th>
                                <th width="10%">Payment Status</th>
                                <th width="10%">Pay</th>
                                <th width="10%">Due</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_orders as $order)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->get_customer->name }}</td>
                                <td>{{ $order->total_products }}</td>
                                <td>{{ $order->total }} tk</td>
                                {{-- <td>{{ $order->payment_status }}</td> --}}
                                <td>
                                    @if ($order->payment_status == "HandCash")
                                        <span class="badge rounded-pill badge-soft-success font-size-12">{{ $order->payment_status }}</span>
                                        @else
                                        <span class="badge rounded-pill badge-soft-warning font-size-12">{{ $order->payment_status }}</span>
                                    @endif
                                </td>
                                <td>{{ $order->pay }} tk</td>
                                <td>{{ $order->due }} tk</td>
                                
                                <td class="d-flex justify-content-start">
                                    
                                    @if (Auth::guard('admin')->user()->can('sales.details'))
                                    <a href="{{ route('sales.details', $order->id) }}" class="btn btn-success" title="Details"><i class="fa fa-eye"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('sales.delete'))
                                    <a href="{{ route('sales.delete', $order->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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