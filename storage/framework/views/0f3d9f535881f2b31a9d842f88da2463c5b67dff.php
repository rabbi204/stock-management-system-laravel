

<?php $__env->startSection('title'); ?>
    STMS | User List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Users List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Users</li>
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
                    <h4 class="card-title ">Users List</h4>
                    <?php if(Auth::guard('admin')->user()->can('admin.create')): ?>
                    <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-primary">New User</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="5%">Photo</th>
                                <th width="15%">Full Name</th>
                                <th width="20%">Email</th>
                                <th width="15%">Phone</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td>
                                    <img src="<?php echo e((!empty($user->photo)) ? url("upload/images/admin_profile_images/".$user->photo) : url('upload/no_image.jpg')); ?>" alt="" style="height: 70px; width:70px; border-radius:50%;">
                                </td>
                                <td><?php echo e($user->full_name); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->phone); ?></td>
                                <td>
                                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="badge badge-pill badge-soft-primary mb-2 font-size-14"><?php echo e($role->name); ?></span>   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="d-flex justify-content-start">
                                    
                                    <?php if(Auth::guard('admin')->user()->can('admin.details')): ?>
                                    <a href="<?php echo e(route('admin.details', $user->id)); ?>" class="btn btn-success" title="Details"><i class="fa fa-eye"></i></a>
                                    <?php endif; ?>

                                    <?php if(Auth::guard('admin')->user()->can('admin.edit')): ?>
                                        <a href="<?php echo e(route('admin.edit', $user->id)); ?>" class="btn btn-warning" style="margin-left: 3px" title="Edit" ><i class="fa fa-edit"></i></a>
                                    <?php endif; ?>
                                        
                                    <?php if(Auth::guard('admin')->user()->can('admin.delete')): ?>
                                    <a href="<?php echo e(route('admin.delete', $user->id)); ?>" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/admin/index.blade.php ENDPATH**/ ?>