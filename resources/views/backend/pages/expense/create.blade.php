@extends('backend.layouts.admin_master')

@section('title')
    STMS | Expense Add
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Create Expense Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Expense</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Add New Expense</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('expense.store') }}"  method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Reference No. <span class="text-danger">*</span></label>
                                <input type="text" name="reference_no" class="form-control" placeholder="Ex: ref101"/>
                            </div>
                        </div> 
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Expense For <span class="text-danger">*</span></label>
                                <input type="text" name="expense_title" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Expense Category <span class="text-danger">*</span></label>
                                <select class="form-control" name="exp_cat_id">
                                    <option value="" selected>-- category --</option>
                                    @foreach ($expense_categories as $category )
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Expense Amount <span class="text-danger">*</span></label>
                                <input type="number" name="amount" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group mb-3">
                                <label>Expense Date <span class="text-danger">*</span></label>
                                <input type="text" readonly name="expense_date" class="form-control datepicker" />
                            </div>
                        </div>

                        {{-- <div class="col-md-6 col-sm-12">
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <h5>Attachment</h5>
                                    <div class="controls">
                                        <input id="image" type="file" name="attachment" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="controls">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="" style="height: 60px; width: 80px; border: none;">
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="col-lg-12 col-md-12">
                            <div class="form-group mb-3">
                                <label>Expense Note <span class="text-danger">*</span></label>
                                <textarea name="expense_note" class="form-control" id="ckeditor-classic" cols="30" rows="3"></textarea>
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