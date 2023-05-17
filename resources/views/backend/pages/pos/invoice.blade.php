@extends('backend.layouts.admin_master')

@section('title')
    STMS | Invoice
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Invoice Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                    <div class="row d-flex align-items-baseline">
                        <div class="col-xl-9">
                            <p style="color: #7e8d9f; font-size: 20px;">Invoice</p>
                        </div>
                        <div class="col-xl-3 float-end">
                            <a class="btn btn-light text-capitalize border-0" onclick="window.print();" data-mdb-ripple-color="dark"><i class="fas fa-print text-primary"></i> Print</a>
                        </div>
                        <hr />
                    </div>

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
                                    <li class="text-muted">To: <span style="color: #5d9fc5;">{{ $customer->name }}</span></li>
                                    <li class="text-muted"><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{ $customer->address }}</li>
                                    <li class="text-muted"><i class="fas fa-phone"></i> Mobile No: {{ $customer->phone }}</li>
                                </ul>
                            </div>
                            <div class="col-xl-4">
                                <p class="text-muted">Invoice</p>
                                @php
                                    $order = App\Models\Order::first();
                                @endphp
                                {{-- <ul class="list-unstyled">
                                    <li class="text-muted"><i class="fas fa-circle" style="color: #84b0ca;"></i> <span class="fw-bold">ID:</span>{{ $order->id }}</li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color: #84b0ca;"></i> <span class="fw-bold">Creation Date: </span>{{ date('d/m/Y') }}</li>
                                    <li class="text-muted"><i class="fas fa-circle" style="color: #84b0ca;"></i> <span class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold"> {{ $order->order_status }}</span></li>
                                </ul> --}}
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
                                    @foreach ($contents as $content)
                                        <tr>
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $content->name }}</td>
                                            <td>{{ $content->qty }}</td>
                                            <td>{{ $content->price }} tk</td>
                                            <td>{{ $content->qty * $content->price  }} tk</td>
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
                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal:</span>{{ Cart::subtotal() }} tk</li>
                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">VAT:</span>{{ Cart::tax() }} tk</li>
                                </ul>
                                <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span style="font-size: 20px;">{{ Cart::total() }} tk</span></p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-xl-10">
                                <p>Thank you for your purchase</p>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-primary text-capitalize" data-bs-toggle="modal" data-bs-target="#customerModal" style="background-color: #60bdf3;">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- end row -->


</div>

<!--customer modal-->
<div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                {{-- @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ $errors->first() }}</strong>
                        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    </div>
                @endif --}}
            <form action="{{ route('final.invoice') }}" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Invoice of {{ $customer->name }} <span class="pull-right" style="margin-left: 74px;font-size: 13px;">Total: {{ trim(Cart::total()) }} tk</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                    <input type="hidden" name="order_date" value="{{ date('Y-m-d') }}">
                    <input type="hidden" name="order_status" value="Done">
                    <input type="hidden" name="total_products" value="{{ Cart::count() }}">
                    <input type="hidden" name="sub_total" value="{{ Cart::subtotal() }}">
                    <input type="hidden" name="vat" value="{{ Cart::tax() }}">
                    <input type="hidden" name="total" value="{{ Cart::total() }}">

                    <div class="mb-3">
                        <label for="payment_status" class="col-form-label">Payment Mehtod <span class="text-danger">*</span></label>
                        <select name="payment_status" id="payment_status" class="form-control">
                            <option value="HandCash">HandCash</option>
                            {{-- <option value="Cheque">Cheque</option>
                            <option value="Bkash">Bkash</option>
                            <option value="Nagad">Nagad</option> --}}
                            <option value="Due">Due</option>
                            <option value="Partially Due">Partially Due</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pay" class="col-form-label">Pay:</label>
                        <input type="text" name="pay" value="{{ str_replace(',', '', Cart::total()) }}" class="form-control" id="pay">
                        <input type="hidden" value="{{ str_replace(',', '', Cart::total()) }}" class="form-control" id="total_amount">
                    </div>
                    <div class="mb-3">
                        <label for="due" class="col-form-label">Due:</label>
                        <input type="text" name="due" value="0" class="form-control" id="due">
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
<script type="text/javascript">
    $(document).ready(function(){

        // show due amount
        $('#pay').keyup(function(){
            let total_amount = $('#total_amount').val();
            let pay_amount = $('#pay').val();
            // let due_amount =  total_amount - pay_amount;
            // let due_amount =  parseFloat(total_amount) - parseFloat(pay_amount);
  
            $('#due').val(total_amount - pay_amount);
        });

        //show photo
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
