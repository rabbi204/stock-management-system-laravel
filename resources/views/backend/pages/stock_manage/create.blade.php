@extends('backend.layouts.admin_master')

@section('title')
    STMS | Stock Manage
@endsection

@section('styles')
@endsection

@section('backend-content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Stock Manage Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Stock Update</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <h5>Add Stock Adjustment</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('product.stock.update') }}"  method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" id="category">
                                    <option value="" selected>--select category--</option>
                                    @foreach ($all_category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Product Name <span class="text-danger">*</span></label>
                                <select name="product_id" class="form-control" id="product">
                                    {{-- <option value="" selected>--select product--</option> --}}
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Stock Quantity <span class="text-danger">*</span></label>
                                <input type="text" name="stock_quantity" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Adjustment Type <span class="text-danger">*</span></label>
                                <select name="adjustment_type" class="form-control" id="">
                                    <option value="Add">Add</option>
                                    <option value="Subtract">Subtract</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Total Stock Quantity</label>
                                <input type="text" id="quantity" readonly class="form-control" />
                            </div>
                        </div>
                        
                    </div>
                    <!-- end row -->
                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#category').on('change', function(){
            let id = $(this).val();
            // alert(name);
            $('#product').empty();
            $('#product').append(`<option value="" selected disabled>Loading...</option>`);
            $.ajax({
                url : '/stock/category/' + id,
                dataType: 'json',
                success: function(response){
                    $('#product').empty();
                    $('#product').append(`<option value="" selected disabled>--select product--</option>`);
                    $.each(response.data, function(index, row){
                        $('#product').append(`<option value="${row.id}">${row.product_name}</option>`);
                    });
                },
            });
        });
        $('#product').on('change', function(){
            let id = $(this).val();
            // alert(doc_name);
            $.ajax({
                url : '/stock/category/product/' + id,
                dataType: 'json',
                success: function(response){
                    // alert(response);
                    $('#quantity').empty();
                    $.each(response.data, function(index, row){
                        $('#quantity').val(`${row.total_quantity}`);
                    });
                },
            });
        });
    });
</script>
@endsection