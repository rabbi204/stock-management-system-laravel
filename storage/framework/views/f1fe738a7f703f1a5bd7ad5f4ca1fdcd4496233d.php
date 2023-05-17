

<?php $__env->startSection('title'); ?>
    STMS | Create New Role
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Create New Role</h5>
            </div>
            <div class="card-body">
                <?php echo $__env->make('backend.layouts.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <form action="<?php echo e(route('roles.store')); ?>"  method="POST">
                    <?php echo csrf_field(); ?>

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
                                <?php $i = 1; ?>
                                <?php $__currentLoopData = $permission_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" value="<?php echo e($group->name); ?>" id="<?php echo e($i); ?>Management" onclick="checkPermissionByGroup('role-<?php echo e($i); ?>-management-checkbox', this)" >
                                                <label class="form-check-label text-capitalize" for="<?php echo e($i); ?>Management">
                                                    <?php echo e($group->name); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-9 role-<?php echo e($i); ?>-management-checkbox">
                                            <?php
                                                $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            ?>
                                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="form-check mb-3">
                                                    <input class="form-check-input" name="permissions[]" type="checkbox" value="<?php echo e($permission->name); ?>" id="Checkbox_<?php echo e($permission->id); ?>">
                                                    <label class="form-check-label" for="Checkbox_<?php echo e($permission->id); ?>">
                                                        <?php echo e($permission->name); ?>

                                                    </label>
                                                </div>
                                                <?php $j++; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <?php $i++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('backend.pages.roles.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/roles/create.blade.php ENDPATH**/ ?>