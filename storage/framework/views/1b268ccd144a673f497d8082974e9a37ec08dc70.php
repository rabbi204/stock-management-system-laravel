

<?php $__env->startSection('title'); ?>
    STMS | Customer List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Customers List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Customers</li>
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
                    <h4 class="card-title ">Customers List</h4>
                    <?php if(Auth::guard('admin')->user()->can('customer.create')): ?>
                    <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-primary">New Customer</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="7%">Photo</th>
                                <th width="15%">Name</th>
                                <th width="15%">Email</th>
                                <th width="15%">Phone</th>
                                <th width="10%">NID</th>
                                <th width="20%">Address</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td>
                                    <img src="<?php echo e((!empty($customer->photo)) ? url("upload/images/customer_images/".$customer->photo) : url('upload/no_image.jpg')); ?>" alt="" style="height: 70px; width:70px; border-radius:50%;">
                                </td>
                                <td><?php echo e($customer->name); ?></td>
                                <td><?php echo e($customer->email); ?></td>
                                <td><?php echo e($customer->phone); ?></td>
                                <td><?php echo e($customer->nid); ?></td>
                                <td><?php echo e($customer->address); ?></td>

                                <td class="d-flex justify-content-start">
                                    
                                    

                                    <?php if(Auth::guard('admin')->user()->can('customer.edit')): ?>
                                        <a href="<?php echo e(route('customer.edit', $customer->id)); ?>" class="btn btn-warning" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <?php endif; ?>
                                        
                                    <?php if(Auth::guard('admin')->user()->can('customer.delete')): ?>
                                    <a href="<?php echo e(route('customer.delete', $customer->id)); ?>" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/customer/index.blade.php ENDPATH**/ ?>