@extends('backend.layouts.admin_master')

@section('title')
    STMS | Expense List
@endsection

@section('styles')
@endsection

@section('backend-content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Expense List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Expenses</li>
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
                    <h4 class="card-title ">Expense List</h4>
                    @if (Auth::guard('admin')->user()->can('expense.create'))
                    <a href="{{ route('expense.create') }}" class="btn btn-primary">New Expense</a>
                    @endif
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="5%">Reference</th>
                                <th width="5%">Expense Date</th>
                                <th width="15%">Expense For</th>
                                <th width="5%">Category</th>
                                <th width="5%">Amount</th>
                                <th width="30%">Expense Note</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_expenses as $expense)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $expense->reference_no }}</td>
                                <td>{{ date('m/d/Y', strtotime($expense->expense_date)) }}</td>
                                <td>{{ $expense->expense_title }}</td>
                                <td>{{ $expense->getExpenseCategoriesName->name }}</td>
                                <td>{{ $expense->amount }} tk</td>
                                <td>{!! $expense->expense_note !!}</td>
                                {{-- <td>{!! Str::words($expense->expense_note, 10, '...') !!}</td> --}}
                                <td class="d-flex justify-content-start">
                                    
                                    @if (Auth::guard('admin')->user()->can('expense.edit'))
                                        <a href="{{ route('expense.edit', $expense->id) }}" class="btn btn-warning" title="Edit" ><i class="fa fa-edit"></i></a>
                                    @endif
                                        
                                    @if (Auth::guard('admin')->user()->can('expense.delete'))
                                    <a href="{{ route('expense.delete', $expense->id) }}" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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