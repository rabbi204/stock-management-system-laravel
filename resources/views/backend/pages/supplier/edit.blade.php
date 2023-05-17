@extends('backend.layouts.admin_master')

@section('title')
    STMS | Create Supplier
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Edit Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Supplier</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit Supplier - {{ $supplier->name }}</h5>
                @if ($errors->any())
                    {{ $errors->first() }}
                @endif
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ $supplier->name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" />
                            </div>
                        </div> 
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ $supplier->address }}" class="form-control" />
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