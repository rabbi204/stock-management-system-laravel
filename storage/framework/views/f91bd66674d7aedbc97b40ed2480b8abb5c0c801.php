

<?php $__env->startSection('title'); ?>
    STMS | Product List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Product List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Product</li>
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
                    <h4 class="card-title ">Product List</h4>
                    <?php if(Auth::guard('admin')->user()->can('product.create')): ?>
                    <a href="<?php echo e(route('product.create')); ?>" class="btn btn-primary">New Product</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th width="3%">SL</th>
                                    <th width="10%">Product Name</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">SubCategory</th>
                                    <th width="5%">Brand</th>
                                    <th width="7%">Supplier</th>
                                    <th width="5%">Unit Type</th>
                                    <th width="7%">Quantity</th>
                                    <th width="7%">Product Weight</th>
                                    <th width="12%">Total Quantity</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $all_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index+1); ?></td>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e($product->getCategory->name); ?></td>
                                    <td><?php echo e($product->getSubCategory->name); ?></td>
                                    <td><?php echo e($product->getBrand->name); ?></td>
                                    <td><?php echo e($product->getSupplier->name); ?></td>
                                    <td><?php echo e($product->unit_type); ?></td>
                                    <td><?php echo e($product->product_quantity); ?></td>
                                    <td><?php echo e($product->product_weight); ?> <?php echo e(( $product->unit_type == "Bag") ? 'kg' : 'gm'); ?></td>
                                    <td><?php echo e($product->total_quantity); ?> <?php echo e(( $product->unit_type == "Bag") ? 'kg' : 'pc'); ?></td>
                                    
                                    <td class="d-flex justify-content-start">
                                        
                                        <?php if(Auth::guard('admin')->user()->can('product.edit')): ?>
                                        <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                            
                                        <?php if(Auth::guard('admin')->user()->can('product.delete')): ?>
                                        <a href="<?php echo e(route('product.delete', $product->id)); ?>" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
    

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/product/index.blade.php ENDPATH**/ ?>