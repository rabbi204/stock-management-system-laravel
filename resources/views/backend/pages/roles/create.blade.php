@extends('backend.layouts.admin_master')

@section('title')
    STMS | Create New Role
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    {{-- <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Roles Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Roles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title --> --}}

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Create New Role</h5>
            </div>
            <div class="card-body">
                @include('backend.layouts.partials.message')
                
                <form action="{{ route('roles.store') }}"  method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="form-group mb-3">
                                <label>Role Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <div class="form-group mb-3">
                                <label>Give Permissions</label>
                                <!--for check permission all-->
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="1" id="checkPermissionAll">
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $group->name }}" id="{{ $i }}Management" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" >
                                                <label class="form-check-label text-capitalize" for="{{ $i }}Management">
                                                    {{ $group->name }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->name }}" id="Checkbox_{{ $permission->id }}">
                                                    <label class="form-check-label" for="Checkbox_{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                                @php $j++; @endphp
                                            @endforeach
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach

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
    @include('backend.pages.roles.partials.scripts')
@endsection