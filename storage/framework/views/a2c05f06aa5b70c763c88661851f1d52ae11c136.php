

<?php $__env->startSection('title'); ?>
    STMS | Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome !</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Welcome !</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Customer</span>
                            <h4 class="mb-3"><span class="counter-value" data-target="<?php echo e($total_customer); ?>">0</span></h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$20.9k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart1" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Items</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="<?php echo e($total_product); ?>">0</span>
                            </h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart2" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Supplier</span>
                            <h4 class="mb-3"><span class="counter-value" data-target="<?php echo e($total_supplier); ?>">0</span></h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+ $2.8k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart3" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Order</span>
                            <h4 class="mb-3"><span class="counter-value" data-target="<?php echo e($total_order); ?>">0</span></h4>
                            <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+5.32%</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <div id="mini-chart4" data-colors='["--bs-primary", "--bs-success"]' class="apex-charts"></div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->


    <div class="row">

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Stock Alert</h4>
                </div>
                <!-- end card header -->

                <div class="card-body px-0 pt-2">
                    <div class="table-responsive px-3" data-simplebar style="max-height: 395px;">
                        <table id="datatable" class="table align-middle table-nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="15%">Product Name</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">SubCategory</th>
                                    <th width="15%">Brand</th>
                                    <th width="10%">Unit Type</th>
                                    <th width="15%">Product Weight</th>
                                    <th width="20%">Total Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $stock_alert; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($stock->product_name); ?></td>
                                    <td><?php echo e($stock->getCategory->name); ?></td>
                                    <td><?php echo e($stock->getSubCategory->name); ?></td>
                                    <td><?php echo e($stock->getBrand->name); ?></td>
                                    <td><?php echo e($stock->unit_type); ?></td>
                                    <td><?php echo e($stock->product_weight); ?> gm</td>
                                    <td>
                                        <?php if($stock->unit_type == "Pieces" || $stock->unit_type == "Box"): ?>
                                        <span class="badge rounded-pill badge-soft-warning font-size-12"><?php echo e($stock->total_quantity); ?> Pieces</span>
                                        <?php else: ?>
                                        <span class="badge rounded-pill badge-soft-warning font-size-12"><?php echo e($stock->total_quantity); ?> KG</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

       
    </div>
    <!-- end row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/dashboard/index.blade.php ENDPATH**/ ?>