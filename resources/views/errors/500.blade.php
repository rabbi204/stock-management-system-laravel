@extends('errors.errors_master')

@section('title')
    STMS | 500-Server Error
@endsection

@section('error-content')
<div class="my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5 pt-5">
                    <h1 class="error-title mt-5"><span>500!</span></h1>
                    <h4 class="text-uppercase mt-5">INTERNAL SERVER ERROR</h4>
                    <p class="font-size-15 mx-auto text-muted w-50 mt-4">{{ $exception->getMessage() }}</p>
                    <div class="mt-5 text-center">
                        @if (Auth::guard('admin')->user())
                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.dashboard') }}">Back to Dashboard</a>
                            @else
                            <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.login') }}">Back to Login</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</div>
@endsection