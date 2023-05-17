

<?php $__env->startSection('title'); ?>
    STMS | 404-Error
<?php $__env->stopSection(); ?>

<?php $__env->startSection('error-content'); ?>
<div class="my-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5 pt-5">
                    <h1 class="error-title mt-5"><span>404!</span></h1>
                    <h4 class="text-uppercase mt-5">SORRY, PAGE NOT FOUND!</h4>
                    <p class="font-size-15 mx-auto text-muted w-50 mt-4"><?php echo e($exception->getMessage()); ?></p>
                    <div class="mt-5 text-center">
                        <?php if(Auth::guard('admin')->user()): ?>
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo e(route('admin.dashboard')); ?>">Back to Dashboard</a>
                            <?php else: ?>
                            <a class="btn btn-primary waves-effect waves-light" href="<?php echo e(route('admin.login')); ?>">Back to Login</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end container -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('errors.errors_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/errors/404.blade.php ENDPATH**/ ?>