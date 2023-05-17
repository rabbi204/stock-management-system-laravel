@extends('backend.layouts.admin_master')

@section('title')
    STMS | Edit Unit
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Edit Unit Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Unit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit Unit - {{ $unit->unit_name }}</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('unit.update', $unit->id) }}"  method="POST" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Unit Name <span class="text-danger">*</span></label>
                                <input type="text" name="unit_name" value="{{ $unit->unit_name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Unit Short Name <span class="text-danger">*</span></label>
                                <input type="text" name="unit_short_name" value="{{ $unit->unit_short_name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Unit Value <span class="text-danger">*</span></label>
                                <input type="text" name="unit_value" value="{{ $unit->unit_value }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Description </label>
                                <input type="text" name="description" value="{{ $unit->description }}" class="form-control">
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