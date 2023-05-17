@extends('backend.layouts.admin_master')

@section('title')
    STMS | Order Details 
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Order Details Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="container mb-5 mt-3">
                    

                    <div class="container">
                        <div class="col-md-12">
                            <div class="text-center">
                                <i class="fab fa-mdb fa-4x ms-0" style="color: #5d9fc5;"></i>
                                <p class="pt-0">BDSOFTFAIR</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-8">
                                <ul class="list-unstyled">
                                    <li class="text-muted">To: <span style="color: #5d9fc5;">{{ $order[0]->get_customer->name }}</span></li>
                                    <li class="text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{ $order[0]->get_customer->address }}</li>
                                    <li class="text-muted"><i class="fas fa-phone"></i> Mobile No: {{ $order[0]->get_customer->phone }}</li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color: #84b0ca;"></i> <span class="fw-bold">ID:</span>{{ $order[0]['id'] }}</li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color: #84b0ca;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"> {{ $order[0]['order_status'] }}</span></li>
                                </ul>
                            </div>
                        </div>

                        <div class="row my-2 mx-1 justify-content-center">
                            <table class="table table-striped table-borderless">
                                <thead style="background-color: #84b0ca;" class="text-white">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order[0]['orderDetails'] as $content)
                                        <tr>
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $content->product->product_name }}</td>
                                            <td>{{ $content->quantity }}</td>
                                            <td>{{ $content->price }} tk</td>
                                            <td>{{ $content->total  }} tk</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-xl-7">
                                <p class="ms-3">Add additional notes and payment information</p>
                            </div>
                            <div class="col-xl-5">
                                <ul class="list-unstyled">
                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal:</span>{{ $order[0]['sub_total'] }} tk</li>
                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">VAT:</span>{{ $order[0]['vat'] }} tk</li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 20px;">{{ $order[0]['total'] }} tk</span></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for your purchase</p>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f; font-size: 20px;">Invoice</p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" onclick="window.print();" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end row -->


</div>


@endsection

@section('scripts')

@endsection
