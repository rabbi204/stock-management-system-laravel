

<?php $__env->startSection('title'); ?>
    STMS | Category List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Category List Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Category</li>
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
                    <h4 class="card-title ">Category List</h4>
                    <?php if(Auth::guard('admin')->user()->can('category.create')): ?>
                    <a href="<?php echo e(route('category.create')); ?>" class="btn btn-primary">New Category</a>
                    <?php endif; ?>
                </div>
                <div class="card-body">

                    <table id="datatable" class="table table-bordered dt-responsive">
                        <thead>
                            <tr>
                                <th width="5%">SL</th>
                                <th width="30%">Name</th>
                                <th width="50%">Description</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->index+1); ?></td>
                                <td><?php echo e($category->name); ?></td>
                                <td><?php echo e($category->description); ?></td>
                                
                                <td class="d-flex justify-content-start">
                                    
                                    <?php if(Auth::guard('admin')->user()->can('category.edit')): ?>
                                    <a href="<?php echo e(route('category.edit', $category->id)); ?>" class="btn btn-warning" title="Edit"><i class="fa fa-edit"></i></a>
                                    <?php endif; ?>
                                        
                                    <?php if(Auth::guard('admin')->user()->can('category.delete')): ?>
                                    <a href="<?php echo e(route('category.delete', $category->id)); ?>" class="btn btn-danger" style="margin-left: 3px" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/category/index.blade.php ENDPATH**/ ?>