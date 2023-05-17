

<?php $__env->startSection('title'); ?>
    STMS | Create Customer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('backend-content'); ?>
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Welcome to Edit Page!</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5>Edit Customer - <?php echo e($customer->name); ?></h5>
            </div>
            <div class="card-body">
                <?php echo $__env->make('backend.layouts.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                <form action="<?php echo e(route('customer.update', $customer->id)); ?>"  method="POST" enctype="multipart/form-data" autocomplete="off">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?php echo e($customer->name); ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="<?php echo e($customer->email); ?>" class="form-control" />
                            </div>
                        </div> 
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Mobile Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="<?php echo e($customer->phone); ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>National ID</label>
                                <input type="text" name="nid" value="<?php echo e($customer->nid); ?>" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="<?php echo e($customer->address); ?>" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="form-group col-md-9">
                                    <label>Attachment</label>
                                    <div class="controls">
                                        <input id="image" type="file" name="photo" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="controls">
                                        <img id="showImage" src="<?php echo e((!empty($customer->photo)) ? url("upload/images/customer_images/".$customer->photo) : url('upload/no_image.jpg')); ?>" alt="" style="height: 60px; width: 80px; border: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="form-group">
                        <button  type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/pages/customer/edit.blade.php ENDPATH**/ ?>