

<?php $__env->startSection('title'); ?>
    STMS | Stock List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Stock List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Stock</li>
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
                    <h4 class="card-title ">Stock List</h4>
                    <?php if(Auth::guard('admin')->user()->can('product.stock.add')): ?>
                    <a href="<?php echo e(route('product.stock.add')); ?>" class="btn btn-primary">Add Product Stock</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="20%">Product Name</th>
                                <th width="15%">Category Name</th>
                                <th width="15%">Product Weight</th>
                                <th width="10%">Brand</th>
                                <th width="20%">Stock</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><?php echo e($product->product_name); ?></td>
                                <td><?php echo e($product->getCategory->name); ?></td>
                                <td><?php echo e($product->product_weight); ?></td>
                                <td><?php echo e($product->getBrand->name); ?></td>
                                

                                <td>
                                    <?php if($product->unit_type == "Pieces" || $product->unit_type == "Box"): ?>
                                    <span class="badge rounded-pill badge-soft-primary font-size-12"><?php echo e($product->total_quantity); ?> Pieces</span>
                                    <?php else: ?>
                                    <span class="badge rounded-pill badge-soft-primary font-size-12"><?php echo e($product->total_quantity); ?> KG</span>
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
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/stock_manage/index.blade.php ENDPATH**/ ?>