@extends('backend.layouts.admin_master')

@section('title')
    STMS | Purchase List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Purchase List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Purchase</li>
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
                    <h4 class="card-title ">Purchase List</h4>
                    @if (Auth::guard('admin')->user()->can('purchase.create'))
                    <a href="{{ route('purchase.create') }}" class="btn btn-primary">New Purchase</a>
                    @endif
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Reference No.</th>
                                    <th width="10%">Purchase Date</th>
                                    <th width="15%">Product Name</th>
                                    <th width="5%">Unit Type</th>
                                    <th width="7%">Quantity</th>
                                    <th width="7%">Weight</th>
                                    <th width="12%">Total Quantity</th>
                                    <th width="10%">Supplier</th>
                                    <th width="10%">Brand</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_purchases as $purchase)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $purchase->reference_no  }}</td>
                                    <td>{{ $purchase->purchase_date }}</td>
                                    <td>{{ $purchase->product_name }}</td>
                                    <td>{{ $purchase->unit_type }}</td>
                                    <td>{{ $purchase->product_quantity }}</td>
                                    <td>{{ $purchase->product_weight }}</td>
                                    <td>{{ $purchase->total_quantity }}</td>
                                    <td>{{ $purchase->getSupplierName->name ?? "supplier deleted" }}</td>
                                    <td>{{ $purchase->getBrandName->name ?? "brand deleted" }}</td>

                                    <td class="d-flex justify-content-start">

                                        @if (Auth::guard('admin')->user()->can('purchase.edit'))
                                        <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('purchase.delete'))
                                        <a href="{{ route('purchase.delete', $purchase->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


</div>
@endsection

@section('scripts')

@endsection
