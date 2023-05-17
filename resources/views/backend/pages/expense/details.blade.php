@extends('backend.layouts.admin_master')

@section('title')
    STMS | User Details 
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-user"></div>
        </div>
    </div>

    <div class="row">
       <div class="profile-content">
           <div class="row align-items-end">
                <div class="col-sm">
                    <div class="d-flex align-items-end mt-3 mt-sm-0">
                        <div class="flex-shrink-0">
                            <div class="avatar-xxl me-3">
                                <img src="{{ (!empty($user->photo) ? url("upload/images/admin_profile_images/".$user->photo) : url('upload/no_image.jpg') ) }}" alt="" class="img-fluid rounded-circle d-block img-thumbnail">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <h5 class="font-size-16 mb-1">{{ $user->full_name }}</h5>
                                @foreach ($user->roles as $role)
                                <p class="text-muted font-size-13 mr-2 mb-2 pb-2">{{ $role->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
    </div>

    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">About</h5>
                        </div>

                        <div class="card-body">
                            <div>
                                <div class="pb-3">
                                    <h5 class="font-size-15">Email : {{ $user->email }}</h5>
                                    <div class="text-muted">
                                        <p class="mb-2"> Address: {{ $user->address }}</p>
                                        <p class="mb-2">Phone: {{ $user->phone }}</p>
                                        <p class="mb-2">National ID No: {{ $user->nid }}</p>
                                        <p class="mb-2">Register Date: {{ $user->register_date }}</p>
                                        <p class="mb-2">Date of Birth: {{ date('d M Y', strtotime($user->birth_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end tab pane -->
            </div>
            <!-- end tab content -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    

</div>
@endsection

@section('scripts')
    
@endsection