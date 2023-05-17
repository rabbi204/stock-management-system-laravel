@extends('backend.layouts.admin_master')

@section('title')
    STMS | Create User
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
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit User - {{ $user->full_name }}</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('admin.update', $user->id) }}"  method="POST" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" />
                            </div>
                        </div> 
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Assign Role <span class="text-danger">*</span></label>
                                <select class="form-control select2-multiple" name="roles[]" multiple="multiple">
                                    @foreach ($roles as $role )
                                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>National ID</label>
                                <input type="number" name="nid" value="{{ $user->nid }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Birth Date</label>
                                <input type="date" name="birth_date" value="{{ $user->birth_date }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Register Date</label>
                                <input type="date" name="register_date" value="{{ $user->register_date }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="{{ $user->address }}" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group mb-3">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-2">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <h5>Photo(w-400,h-400)px</h5>
                                <div class="controls">
                                    <input id="image" type="file" name="photo" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="controls">
                                    <img id="showImage" src="{{ (!empty($user->photo)) ? url("upload/images/admin_profile_images/".$user->photo) : url('upload/no_image.jpg') }}" alt="" style="height: 60px; width: 80px;">
                                </div>
                            </div>
                        </div>
                    </div> <!--end row-->
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