<?php
    $user = Auth::guard('admin')->user();
?>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo e(('assets/images/logo-sm.svg')); ?>" alt="" height="30" />
                    </span>
                    <span class="logo-lg"> <img src="<?php echo e(('assets/images/logo-sm.svg')); ?>" alt="" height="24" /> <span class="logo-txt">STMS</span> </span>
                </a>

                <a href="<?php echo e(route('admin.dashboard')); ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo e(asset('backend/assets/images/logo-sm.svg')); ?>" alt="" height="30" />
                    </span>
                    <span class="logo-lg"> <img src="<?php echo e(asset('backend/assets/images/logo-sm.svg')); ?>" alt="" height="24" /> <span class="logo-txt">STMS</span> </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            
        </div>

       <div class="center">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-info text-light mr-3" title="Dashboard"><i data-feather="home"></i></a>
            <?php if($user->can('product.list')): ?>
                <a href="<?php echo e(route('product.list')); ?>" class="btn btn-sm btn-success text-light mr-3" title="Product"><i data-feather="list"></i></a>
            <?php endif; ?>
            <?php if($user->can('customer.list')): ?>
                <a href="<?php echo e(route('customer.list')); ?>" class="btn btn-sm btn-info text-light mr-3" title="Customer"><i data-feather="users"></i></a>
            <?php endif; ?>
            <?php if($user->can('purchase.list')): ?>
                <a href="<?php echo e(route('purchase.list')); ?>"" class="btn btn-sm btn-secondary text-light mr-3" title="Purchase"><i data-feather="shopping-cart"></i></a>
            <?php endif; ?>
            <?php if($user->can('supplier.list')): ?>
                <a href="<?php echo e(route('supplier.list')); ?>" class="btn btn-sm btn-danger text-light mr-3" title="Supplier"><i data-feather="user-plus"></i></a>
            <?php endif; ?>
            <?php if($user->can('expense.list')): ?>
                <a href="<?php echo e(route('expense.list')); ?>" class="btn btn-sm btn-warning text-light mr-3" title="Expense"><i data-feather="minus-circle"></i></a>
            <?php endif; ?>
            <a href="<?php echo e(route('pos.index')); ?>" class="btn btn-sm btn-success text-light mr-3" title="POS"><i data-feather="plus-square"></i> POS</a>
       </div>

        <div class="d-flex">

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <?php
                    $user = Auth::guard('admin')->user();
                ?>
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo e((!empty($user->photo)) ? url("upload/images/admin_profile_images/".$user->photo) : url('upload/no_image.jpg')); ?>" alt="Header Avatar" />
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo e($user->full_name); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?php echo e(route('admin.profile')); ?>"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('admin.logout')); ?>"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/layouts/partials/header.blade.php ENDPATH**/ ?>