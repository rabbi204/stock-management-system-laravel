@extends('backend.layouts.admin_master')

@section('title')
    STMS | Edit Product
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Edit Product Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit Product - {{ $product->product_name }}</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')

                <form action="{{ route('product.update', $product->id) }}"  method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_category as $category)  
                                        <option value="{{ $category->id }}" {{ ($category->id == $product->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Sub Category <span class="text-danger">*</span></label>
                                <select name="sub_category_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_sub_category as $sub_category)  
                                        <option value="{{ $sub_category->id }}" {{ ($sub_category->id == $product->sub_category_id) ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Unit Type<span class="text-danger">*</span></label>
                                <select name="unit_type" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_units as $unit)  
                                        <option value="{{ $unit->unit_short_name }}">{{ $unit->unit_short_name  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Product Weight <span class="text-danger">*</span></label>
                                <input type="number" name="product_weight" value="{{ $product->product_weight }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Quantity <span class="text-danger">*</span></label>
                                <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Number of Packet <span class="text-danger">*</span></label>
                                <input type="number" name="number_of_packet" value="{{ $product->number_of_packet }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Supplier <span class="text-danger">*</span></label>
                                <select name="supplier_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_suppliers as $supplier)  
                                        <option value="{{ $supplier->id }}" {{ ($supplier->id == $product->supplier_id) ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Brand <span class="text-danger">*</span></label>
                                <select name="brand_id" class="form-control" id="">
                                    <option value="" selected>-select-</option>
                                    @foreach ($all_brands as $brand)  
                                        <option value="{{ $brand->id }}" {{ ($brand->id == $product->brand_id) ? 'selected' : '' }}>{{ $brand->name }}</option>
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