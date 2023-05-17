@extends('backend.layouts.admin_master')

@section('title')
    STMS | Purchase Report
@endsection

@section('styles')
{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css"> --}}
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Purchase Report Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Purchase Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label>From Date(m-d-Y) <span class="text-danger">*</span></label>
                                    <input type="text" name="from_date" id="from_date" readonly class="form-control datepicker"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group mb-3">
                                    <label>To Date(m-d-Y) <span class="text-danger">*</span></label>
                                    <input type="text" name="to_date"  id="to_date" readonly class="form-control datepicker"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button  type="button" name="filter" id="filter" class="btn btn-primary">Search</button>
                            <button  type="button" name="refresh" id="refresh" class="btn btn-warning">Refresh</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--row-->

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p>Total records -<span id="total_reocrds"></span></p>

                    {{-- <table id="datatable" class="table table-bordered dt-responsive"> --}}
                    <table class="table table-bordered dt-responsive">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th width="5%">#</th>
                                <th width="10%">Reference No</th>
                                <th width="10%">Purchase Date(Y-m-d)</th>
                                <th width="15%">Product Name</th>
                                <th width="5%">Unit Type</th>
                                <th width="10%">Quantity</th>
                                <th width="15%">Total Quantity</th>
                                <th width="15%">Supplier ID</th>
                                <th width="15%">Brand</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                        </tbody>
                    </table>
                    {{ csrf_field() }}
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    
</div>
@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> --}}
    <script>
        $(document).ready(function(){

            let date = new Date();

            let _token = $('input[name="_token"]').val();

            // method call
            purchase_fetch_data();

            function purchase_fetch_data(from_date='', to_date=''){
                $.ajax({
                    url: '/report/purchase/search/data',
                    method: "POST",
                    data: {from_date:from_date, to_date:to_date, _token:_token},
                    dataType: "json",
                    success: function(data){
                        let output = "";
                        $('#total_reocrds').text(data.length);

                        let i = 1;
                        for (let count = 0; count < data.length; count++) {
                           output += '<tr>';
                           output += '<td>'+ i++; +'</td>';
                           output += '<td>'+ data[count].reference_no  +'</td>';
                           output += '<td>'+ data[count].purchase_date +'</td>';
                           output += '<td>'+ data[count].product_name +'</td>';
                           output += '<td>'+ data[count].unit_type +'</td>';
                           output += '<td>'+ data[count].product_quantity +'</td>';
                           output += '<td>'+ data[count].total_quantity +'</td>';
                           output += '<td>'+ data[count].get_supplier_name.name  +'</td>';
                           output += '<td>'+ data[count].get_brand_name.name  +'</td></tr>';
                            
                        }
                        $('tbody').html(output);
                    }
                });
            }

            // search by date
            $('#filter').click(function(){
                let from_date = $('#from_date').val();
                let to_date = $('#to_date').val();

                if(from_date != '' &&  to_date != ''){
                    purchase_fetch_data(from_date, to_date);
                }else{
                    alert('Both date is required');
                }
            });

            //clear form value
            $('#refresh').click(function(){
                $('#from_date').val('');
                $('#to_date').val('');
                purchase_fetch_data();
            });

        });
    </script>
@endsection