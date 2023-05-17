@extends('backend.layouts.admin_master')

@section('title')
    STMS | Edit Purchase
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Edit Purchase Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Purchase</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit Purchase - {{ $purchase->product_name }}</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('purchase.update', $purchase->id) }}"  method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Reference No <span class="text-danger">*</span></label>
                                <input type="text" name="reference_no" value="{{ $purchase->reference_no }}" class="form-control" disabled placeholder="Ex: PU0001" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Purchase Date <span class="text-danger">*</span></label>
                                <input type="text" name="purchase_date" value="{{ $purchase->purchase_date }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="product_name" value="{{ $purchase->product_name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Unit Type <span class="text-danger">*</span></label>
                                <select name="unit_type" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_units as $unit)  
                                        <option value="{{ $unit->unit_short_name }}" {{ ($unit->unit_short_name == $purchase->unit_type) ? 'selected' : '' }}>{{ $unit->unit_short_name  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Product Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="product_quantity" value="{{ $purchase->product_quantity }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Product Weight <span class="text-danger">*</span></label>
                                <input type="text" name="product_weight" value="{{ $purchase->product_weight }}" placeholder="Ex: 10gm or 10kg" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Number of Packet <span class="text-danger">*</span></label>
                                <input type="number" name="number_of_packet" value="{{ $purchase->number_of_packet }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Supplier <span class="text-danger">*</span></label>
                                <select name="supplier_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_suppliers as $supplier)  
                                        <option value="{{ $supplier->id }}" {{ ($supplier->id == $purchase->supplier_id) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Brand <span class="text-danger">*</span></label>
                                <select name="brand_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_brands as $brand)  
                                        <option value="{{ $brand->id }}" {{ ($brand->id == $purchase->brand_id) ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')

@endsection