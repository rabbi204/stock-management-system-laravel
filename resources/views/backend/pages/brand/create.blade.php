@extends('backend.layouts.admin_master')

@section('title')
    STMS | Create Brand
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Create Brand Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Create Brand</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <h5>Create New Brand</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('brand.store') }}"  method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Brand Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Description </label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="2"></textarea>
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

@endsection