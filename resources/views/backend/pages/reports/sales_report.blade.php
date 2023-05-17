@extends('backend.layouts.admin_master')

@section('title')
    STMS | Sales Report
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Sales Report Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Sales Report</li>
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
                                <th width="10%">Invoice No</th>
                                <th width="10%">Order Date(Y-m-d)</th>
                                <th width="15%">Customer Id</th>
                                <th width="5%">Order Status</th>
                                <th width="10%">Total Products</th>
                                <th width="15%">Total</th>
                                <th width="15%">Pay</th>
                                <th width="15%">Due</th>
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
    <script>
        $(document).ready(function(){

            let date = new Date();

            let _token = $('input[name="_token"]').val();

            // method call
            fetch_data();

            function fetch_data(from_date='', to_date=''){
                $.ajax({
                    url: '/report/sales/search/data',
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
                           output += '<td>'+ data[count].id +'</td>';
                           output += '<td>'+ data[count].order_date +'</td>';
                           output += '<td>'+ data[count].get_customer.name +'</td>';
                           output += '<td>'+ data[count].order_status +'</td>';
                           output += '<td>'+ data[count].total_products +'</td>';
                           output += '<td>'+ data[count].total +' tk' +'</td>';
                           output += '<td>'+ data[count].pay +' tk'+'</td>';
                           output += '<td>'+ data[count].due +' tk'+'</td></tr>';
                            
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
                    fetch_data(from_date, to_date);
                }else{
                    alert('Both date is required');
                }
            });

            //clear form value
            $('#refresh').click(function(){
                $('#from_date').val('');
                $('#to_date').val('');
                fetch_data();
            });

        });
    </script>
@endsection