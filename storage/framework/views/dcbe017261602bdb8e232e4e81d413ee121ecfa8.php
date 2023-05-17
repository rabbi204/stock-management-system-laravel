<?php
    $user = Auth::guard('admin')->user();
?>

<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                        <i data-feather="home"></i>
                        
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo e(route('pos.index')); ?>">
                        <i data-feather="plus-square"></i>
                        
                        <span data-key="t-dashboard">POS</span>
                    </a>
                </li>

                <li class="menu-title" data-key="t-apps">Modules</li>

                <!--category and subcategory module-->
                <?php if($user->can('category.list') || $user->can('category.create') || $user->can('category.edit') || $user->can('category.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="package"></i>
                        <span data-key="t-ecommerce">Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('category.create')): ?>
                        <li><a href="<?php echo e(route('category.create')); ?>" data-key="t-product-detail">New Category</a></li>
                        <?php endif; ?>

                        <?php if($user->can('category.list')): ?>
                        <li><a href="<?php echo e(route('category.list')); ?>" data-key="t-product-detail">Category List</a></li>
                        <?php endif; ?>

                        <?php if($user->can('sub.category.create')): ?>
                        <li><a href="<?php echo e(route('sub.category.create')); ?>" data-key="t-product-detail">New SubCategory</a></li>
                        <?php endif; ?>

                        <?php if($user->can('sub.category.list')): ?>
                        <li><a href="<?php echo e(route('sub.category.list')); ?>" data-key="t-product-detail">SubCategory List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>
                
                <!--brand module-->
                <?php if($user->can('brand.create') || $user->can('brand.list') || $user->can('brand.edit') || $user->can('brand.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="package"></i>
                        <span data-key="t-ecommerce">Brand</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('brand.create')): ?>
                        <li><a href="<?php echo e(route('brand.create')); ?>" data-key="t-product-detail">New Brand</a></li>
                        <?php endif; ?>

                        <?php if($user->can('brand.list')): ?>
                        <li><a href="<?php echo e(route('brand.list')); ?>" data-key="t-product-detail">Brand List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--supplier module-->
                <?php if($user->can('supplier.list') || $user->can('supplier.create') || $user->can('supplier.edit') || $user->can('supplier.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="user-plus"></i>
                        <span data-key="t-ecommerce">Suppliers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('supplier.create')): ?>
                        <li><a href="<?php echo e(route('supplier.create')); ?>" data-key="t-product-detail">New Supplier</a></li>
                        <?php endif; ?>

                        <?php if($user->can('supplier.list')): ?>
                        <li><a href="<?php echo e(route('supplier.list')); ?>" data-key="t-product-detail">Suppliers List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--product module-->
                <?php if($user->can('product.list') || $user->can('product.create') || $user->can('product.edit') || $user->can('product.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="list"></i>
                        <span data-key="t-ecommerce">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('product.create')): ?>
                        <li><a href="<?php echo e(route('product.create')); ?>" data-key="t-product-detail">New Product</a></li>
                        <?php endif; ?>

                        <?php if($user->can('product.list')): ?>
                        <li><a href="<?php echo e(route('product.list')); ?>" data-key="t-product-detail">Product List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--purchase module-->
                <?php if($user->can('purchase.list') || $user->can('purchase.create') || $user->can('purchase.edit') || $user->can('purchase.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="shopping-bag"></i>
                        <span data-key="t-ecommerce">Purchase</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('purchase.create')): ?>
                        <li><a href="<?php echo e(route('purchase.create')); ?>" data-key="t-product-detail">New Purchase</a></li>
                        <?php endif; ?>

                        <?php if($user->can('purchase.list')): ?>
                        <li><a href="<?php echo e(route('purchase.list')); ?>" data-key="t-product-detail">Purchases List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--customer module-->
                <?php if($user->can('customer.list') || $user->can('customer.create') || $user->can('customer.edit') || $user->can('customer.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="users"></i>
                        <span data-key="t-ecommerce">Customers</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('customer.create')): ?>
                        <li><a href="<?php echo e(route('customer.create')); ?>" data-key="t-product-detail">New Customer</a></li>
                        <?php endif; ?>

                        <?php if($user->can('customer.list')): ?>
                        <li><a href="<?php echo e(route('customer.list')); ?>" data-key="t-product-detail">Customer List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--stock module-->
                <?php if($user->can('product.stock.list') || $user->can('product.stock.add') || $user->can('product.edit')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="bar-chart-2"></i>
                        <span data-key="t-ecommerce">Stock</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('product.stock.add')): ?>
                        <li><a href="<?php echo e(route('product.stock.add')); ?>" data-key="t-product-detail">Add Product Stock</a></li>
                        <?php endif; ?>

                        <?php if($user->can('product.stock.list')): ?>
                        <li><a href="<?php echo e(route('product.stock.list')); ?>" data-key="t-product-detail">Stock Adjustment List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?> 

                <!--Sales module-->
                <?php if($user->can('sales.list')): ?>
                <li>
                    <a href="<?php echo e(route('sales.list')); ?>">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-chat">Sales List</span>
                    </a>
                </li>
                <?php endif; ?>

                <!--Expense module-->
                <?php if($user->can('expense.category.list') || $user->can('expense.category.create') || $user->can('expense.create') || $user->can('expense.list') || $user->can('expense.edit') || $user->can('expense.delete')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="minus-circle"></i>
                        <span data-key="t-ecommerce">Expense</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('expense.category.create')): ?>
                        <li><a href="<?php echo e(route('expense.category.create')); ?>" key="t-products">New Expense Category</a></li>
                        <?php endif; ?>

                        <?php if($user->can('expense.category.list')): ?>
                        <li><a href="<?php echo e(route('expense.category.list')); ?>" key="t-products">Expense Category List</a></li>
                        <?php endif; ?>
                        <?php if($user->can('expense.create')): ?>
                        <li><a href="<?php echo e(route('expense.create')); ?>" data-key="t-product-detail">New Expense</a></li>
                        <?php endif; ?>
                        <?php if($user->can('expense.list')): ?>
                        <li><a href="<?php echo e(route('expense.list')); ?>" data-key="t-product-detail">Expense List</a></li>
                        <?php endif; ?>
                    </ul>
                </li> 
                <?php endif; ?>

                <!--report module-->
                <?php if($user->can('sales.report') || $user->can('purchase.report') || $user->can('due.report') || $user->can('expense.report') || $user->can('stock.report')): ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="pie-chart"></i>
                        <span data-key="t-ecommerce">Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php if($user->can('sales.report')): ?>
                        <li><a href="<?php echo e(route('sales.report')); ?>" data-key="t-product-detail">Sales Report</a></li>
                        <?php endif; ?>

                        <?php if($user->can('purchase.report')): ?>
                        <li><a href="<?php echo e(route('purchase.report')); ?>" data-key="t-product-detail">Purchase Report</a></li>
                        <?php endif; ?>

                        <?php if($user->can('expense.report')): ?>
                        <li><a href="<?php echo e(route('expense.report')); ?>" data-key="t-product-detail">Expense Report</a></li>
                        <?php endif; ?>

                        
                        
                        

                         
                    </ul>
                </li> 
                <?php endif; ?> 

                <!--admin module-->
                <?php if($user->can('admin.list') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('admin.update')): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow">
                            <i data-feather="users"></i>
                            <span data-key="t-ecommerce">Users</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if($user->can('role.list')): ?>
                                <li><a href="<?php echo e(route('roles.index')); ?>">Roles</a></li>
                            <?php endif; ?>
                            <?php if($user->can('admin.create')): ?>
                                <li><a href="<?php echo e(route('admin.create')); ?>">New User</a></li>
                            <?php endif; ?>
                            <?php if($user->can('admin.list')): ?>
                                <li><a href="<?php echo e(route('admin.list')); ?>">Users List</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!--unit module-->
                <?php if($user->can('unit.list')): ?>
                <li>
                    <a href="<?php echo e(route('unit.list')); ?>">
                        <i data-feather="message-square"></i>
                        <span data-key="t-chat">Unit List</span>
                    </a>
                </li>
                <?php endif; ?>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div><?php /**PATH C:\xampp\htdocs\stms\resources\views/backend/layouts/partials/sidebar.blade.php ENDPATH**/ ?>