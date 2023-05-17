<!DOCTYPE html>
<html lang="en" data-theme-mode="purple">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $__env->yieldContent('title', 'STMS | Stock Management System'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="Md.Rabbi" name="author" />
       
        <?php echo $__env->make('backend.layouts.partials.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('styles'); ?>
    </head>

    <body data-topbar="dark">
        <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
            <?php echo $__env->make('backend.layouts.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- ========== Left Sidebar Start ========== -->
            <?php echo $__env->make('backend.layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <?php echo $__env->yieldContent('backend-content'); ?>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php echo $__env->make('backend.layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <!-- end main content-->
        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <?php echo $__env->make('backend.layouts.partials.right_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <?php echo $__env->make('backend.layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/layouts/admin_master.blade.php ENDPATH**/ ?>