<!doctype html>
<html lang="en" data-theme-mode="purple">

    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title', 'STMS | Error'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />

        <?php echo $__env->make('backend.layouts.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('styles'); ?>

    </head>

    <body data-topbar="dark">

        <!-- <body data-layout="horizontal"> -->
        <?php echo $__env->yieldContent('error-content'); ?>
        <!-- end content -->
        
        <!-- JAVASCRIPT -->
        <?php echo $__env->make('backend.layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('scripts'); ?>

    </body>

</html>
<?php /**PATH C:\xampp\htdocs\stms\resources\views/errors/errors_master.blade.php ENDPATH**/ ?>