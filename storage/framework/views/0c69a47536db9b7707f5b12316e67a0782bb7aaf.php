

<?php $__env->startSection('title'); ?>
    STMS | Role Manage
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
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
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Role List</h4>
                    <?php if(Auth::guard('admin')->user()->can('role.edit')): ?>
                    <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-primary">New Role</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th width="3%">SL</th>
                                <th width="10%">Role Name</th>
                                <th width="70%">Permissions</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><?php echo e($role->name); ?></td>
                                <td>
                                    <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <span class="badge badge-pill badge-soft-primary mb-2 font-size-14"><?php echo e($perm->name); ?></span>   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </td>
                                <td class="d-flex">
                                    <?php if(Auth::guard('admin')->user()->can('role.edit')): ?>
                                        <a href="<?php echo e(route('roles.edit', $role->id)); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <?php endif; ?>
                                        
                                    <?php if(Auth::guard('admin')->user()->can('role.delete')): ?>
                                        <a href="<?php echo e(route('roles.destroy',$role->id)); ?>" class="btn btn-danger" style="margin-left: 3px"  onclick=" event.preventDefault(); document.getElementById('delete-form-<?php echo e($role->id); ?>').submit();">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-form-<?php echo e($role->id); ?>" action="<?php echo e(route('roles.destroy',$role->id)); ?>" method="POST" style="display: none">
                                            <?php echo method_field('DELETE'); ?>
                                            <?php echo csrf_field(); ?>
                                        </form>
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
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/roles/index.blade.php ENDPATH**/ ?>