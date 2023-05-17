@extends('backend.layouts.admin_master')

@section('title')
    STMS | Category List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Category List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title ">Category List</h4>
                    @if (Auth::guard('admin')->user()->can('category.create'))
                    <a href="{{ route('category.create') }}" class="btn btn-primary">New Category</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="30%">Name</th>
                                <th width="50%">Description</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_categories as $category)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                
                                <td class="d-flex justify-content-start">
                                    
                                    @if (Auth::guard('admin')->user()->can('category.edit'))
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('category.delete'))
                                    <a href="{{ route('category.delete', $category->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    

</div>
@endsection

@section('scripts')
    
@endsection