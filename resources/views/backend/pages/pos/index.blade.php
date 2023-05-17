@extends('backend.layouts.admin_master')

@section('title')
    STMS | POS
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to POS Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">POS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-6 col-lg-6 col-md-6 card">
            <div class="card-body">
                @include('backend.layouts.partials.message')


                    <div class="row mt-2">
                        <div class="table-responsive" style="font-size:14px">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th width="10%">Name</th>
                                        {{-- <th width="20%">Type</th> --}}
                                        <th width="20%">Qty</th>
                                        <th width="20%">Price</th>
                                        <th width="10%">Sub Total</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $product_cart = Cart::content();
                                    @endphp
                                    @foreach ($product_cart as $cart)
                                    <tr>
                                        <td>{{ $cart->name }}</td>
                                        {{-- <td>
                                            <select name="" id="">
                                                <option value="">Fertilizer</option>
                                                <option value="">Presticide</option>
                                            </select>
                                        </td> --}}
                                        <td>
                                            <form action="{{ route('cart.qty.update', $cart->rowId) }}" method="POST">
                                                @csrf
                                                <input type="number" value="{{ $cart->qty }}" name="qty" style="width:60px;">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.price.update', $cart->rowId) }}" method="POST">
                                                @csrf
                                                <input type="number" value="{{ $cart->price }}" name="price" style="width:80px;">
                                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                            </form>
                                        </td>
                                        <td>{{ $cart->price * $cart->qty }} tk</td>
                                        <td><a href="{{ route('cart.remove', $cart->rowId) }}" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--end row-->

                    <div class="row mt-5">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Total Qty</label>
                                <input type="text" name="total_qty" value="{{ Cart::count(); }}" readonly class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Sub Total</label>
                                <input type="text" name="sub_total" value="{{ Cart::subtotal(); }}" readonly class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>VAT</label>
                                <input type="text" name="vat" value="{{ Cart::tax(); }}" readonly class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Total</label>
                                <input type="text" name="total" value="{{ Cart::total(); }}" readonly class="form-control"/>
                            </div>
                        </div>
                        {{-- <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Pay <span class="text-danger">*</span></label>
                                <input type="text" name="pay" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Due <span class="text-danger">*</span></label>
                                <input type="text" readonly name="due" class="form-control"/>
                            </div>
                        </div> --}}
                    </div>
                <form action="{{ route('create.invoice') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-9 col-lg-9 col-6">
                            <select name="customer_id" class="select2-single form-control">
                                <option value="" selected>Walk-in customer</option>
                                @foreach ($all_customer as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->phone }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-lg-3 col-6">
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customerModal">New Customer</a>
                        </div>
                    </div><!--end row-->

                    <div class="form-group float-start mt-5">
                        <button  type="submit" class="btn btn-primary">Order Now</button>
                    </div>
                </form>
            </div>

        </div> <!-- end col -->


        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">All</span>
                            </a>
                        </li>

                        @foreach ($all_category as $category)
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#category_{{ $category->id }}" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <!--for tab panes all-->
                        <div class="tab-pane active" id="all" role="tabpanel">
                            <div class="row">
                                @forelse ($all_product as $product)
                                    <div class="col-md-4 col-lg-4 col-4 mt-2">
                                        <div class="card">
                                            <div class="card-body">
                                                <form action="{{ route('add.cart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                    <input type="hidden" name="qty" value="1">
                                                    <input type="hidden" name="price" value="1">
                                                    <input type="hidden" name="weight" value="{{ $product->product_weight }}">

                                                    <h5 class="card-title text-capitalize">{{ $product->product_name }}</h5>
                                                    <p class="card-text">Category: {{ $product->getCategory->name }}</p>
                                                    <p class="card-text">Brand: {{ $product->getBrand->name }}</p>
                                                    <p class="card-text"> {{ ($product->total_quantity < 1) ? 'Out of Stock' : 'In Stock:' }} <span class="badge badge-pill {{ ($product->total_quantity < 11) ? 'badge-soft-warning' : 'badge-soft-success' }}  badge-soft-success font-size-12">{{ ($product->total_quantity > 0) ? $product->total_quantity  : '' }} {{ ($product->unit_type == "Bag") ? 'kg' : 'pc' }}</span></p>
                                                    <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
                                    @empty
                                    <p class="text-bold text-danger">No product found! </p>
                                @endforelse
                            </div>
                        </div>

                        <!--category wise data show-->
                        @foreach ($all_category as $category)
                            <div class="tab-pane" id="category_{{ $category->id }}" role="tabpanel">
                                @php
                                    $categorywise_product = App\Models\Product::where('category_id', $category->id)->orderBy('id','desc')->get();
                                @endphp
                                <div class="row">
                                    @forelse ($categorywise_product as $product)
                                        <div class="col-md-4 col-lg-4 col-4 mt-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <form action="{{ route('add.cart') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->product_name }}">
                                                        <input type="hidden" name="qty" value="1">
                                                        <input type="hidden" name="price" value="1">
                                                        <input type="hidden" name="weight" value="{{ $product->product_weight }}">

                                                        <h5 class="card-title text-capitalize">{{ $product->product_name }}</h5>
                                                        <p class="card-text">Category: {{ $product->getCategory->name }}</p>
                                                        <p class="card-text">Brand: {{ $product->getBrand->name }}</p>
                                                        <p class="card-text"> {{ ($product->total_quantity < 1) ? 'Out of Stock' : 'In Stock:' }} <span class="badge badge-pill {{ ($product->total_quantity < 11) ? 'badge-soft-warning' : 'badge-soft-success' }}  badge-soft-success font-size-12">{{ ($product->total_quantity > 0) ? $product->total_quantity  : '' }} {{ ($product->unit_type == "Bag") ? 'kg' : 'pc' }}</span></p>
                                                        <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        <p class="text-bold text-danger">No product found! </p>
                                    @endforelse
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!-- end col -->



    </div> <!-- end row -->


</div>

<!--customer modal-->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Add New Customer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name: <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="col-form-label">Phone:<span class="text-danger">*</span></label>
                        <input type="text" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Address:</label>
                        <input type="text" name="address" class="form-control" id="address">
                    </div>
                    <div class="mb-3">
                        <label for="nid" class="col-form-label">NID:</label>
                        <input type="text" name="nid" class="form-control" id="nid">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="photo" class="col-form-label">Photo:</label>
                        <input type="file" name="photo" class="form-control" id="photo">
                    </div> --}}


                    <div class="row mb-3">
                        <div class="form-group col-md-9">
                            <label>Photo</label>
                            <div class="controls">
                                <input id="image" type="file" name="photo" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="controls">
                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="" style="height: 60px; width: 80px; border: none;">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{{-- <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
    })
</script> --}}

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
