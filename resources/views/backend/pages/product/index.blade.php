@extends('backend.layouts.admin_master')

@section('title')
    STMS | Product List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Product List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Product</li>
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
                    <h4 class="card-title ">Product List</h4>
                    @if (Auth::guard('admin')->user()->can('product.create'))
                    <a href="{{ route('product.create') }}" class="btn btn-primary">New Product</a>
                    @endif
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Product Name</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">SubCategory</th>
                                    <th width="5%">Brand</th>
                                    <th width="7%">Supplier</th>
                                    <th width="5%">Unit Type</th>
                                    <th width="7%">Quantity</th>
                                    <th width="7%">Product Weight</th>
                                    <th width="12%">Total Quantity</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_product as $product)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $product->product_name  }}</td>
                                    <td>{{ $product->getCategory->name }}</td>
                                    <td>{{ $product->getSubCategory->name }}</td>
                                    <td>{{ $product->getBrand->name }}</td>
                                    <td>{{ $product->getSupplier->name }}</td>
                                    <td>{{ $product->unit_type }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>{{ $product->product_weight }} {{ ( $product->unit_type == "Bag") ? 'kg' : 'gm' }}</td>
                                    <td>{{ $product->total_quantity }} {{ ( $product->unit_type == "Bag") ? 'kg' : 'pc' }}</td>
                                    
                                    <td class="d-flex justify-content-start">
                                        
                                        @if (Auth::guard('admin')->user()->can('product.edit'))
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endif
                                            
                                        @if (Auth::guard('admin')->user()->can('product.delete'))
                                        <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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