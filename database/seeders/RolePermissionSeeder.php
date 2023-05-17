<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin','guard_name' => 'admin']);

        // Permission List as array
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    // Dashboard
                    'admin.dashboard',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions'=> [
                    //Admin Permissions
                    'admin.list',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                    'admin.details',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions'=> [
                    //Role Permissions
                    'role.list',
                    'role.create',
                    'role.store',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ]
            ],
            [
                'group_name' => 'expense category',
                'permissions'=> [
                    //Expense category Permissions
                    'expense.category.list',
                    'expense.category.create',
                    'expense.category.store',
                    'expense.category.edit',
                    'expense.category.update',
                    'expense.category.delete'
                ]
            ],
            [
                //expense permission
                'group_name' => 'expense',
                'permissions' => [
                    'expense.list',
                    'expense.create',
                    'expense.store',
                    'expense.edit',
                    'expense.update',
                    'expense.delete'
                ]
            ],
            [
                //category permission
                'group_name' => 'category',
                'permissions' => [
                    'category.list',
                    'category.create',
                    'category.store',
                    'category.edit',
                    'category.update',
                    'category.delete'
                ]
            ],
            [
                //sub category permission
                'group_name' => 'sub category',
                'permissions' => [
                    'sub.category.list',
                    'sub.category.create',
                    'sub.category.store',
                    'sub.category.edit',
                    'sub.category.update',
                    'sub.category.delete'
                ]
            ],
            [
                //brand permission
                'group_name' => 'brand',
                'permissions' => [
                    'brand.list',
                    'brand.create',
                    'brand.store',
                    'brand.edit',
                    'brand.update',
                    'brand.delete'
                ]
            ],
            [
                //supplier permission
                'group_name' => 'supplier',
                'permissions' => [
                    'supplier.list',
                    'supplier.create',
                    'supplier.store',
                    'supplier.edit',
                    'supplier.update',
                    'supplier.delete'
                ]
            ],

            [
                //unit  permission
                'group_name' => 'unit',
                'permissions' => [
                    'unit.list',
                    'unit.create',
                    'unit.store',
                    'unit.edit',
                    'unit.update',
                    'unit.delete'
                ]
            ],
            [
                //purchase permission
                'group_name' => 'purchase',
                'permissions' => [
                    'purchase.list',
                    'purchase.create',
                    'purchase.store',
                    'purchase.edit',
                    'purchase.update',
                    'purchase.delete',
                    'purchase.details'
                ]
            ],
            [
                //customer permission
                'group_name' => 'customer',
                'permissions' => [
                    'customer.list',
                    'customer.create',
                    'customer.store',
                    'customer.edit',
                    'customer.update',
                    'customer.delete',
                    'customer.details'
                ]
            ],
            [
                //product permission
                'group_name' => 'product',
                'permissions' => [
                    'product.list',
                    'product.create',
                    'product.store',
                    'product.edit',
                    'product.update',
                    'product.delete',
                    'product.details'
                ]
            ],
            [
                //sales permission
                'group_name' => 'sales',
                'permissions' => [
                    'sales.list',
                    'sales.details',
                    'sales.delete'
                ]
            ],
            [
                //stock permission
                'group_name' => 'stock',
                'permissions' => [
                    'product.stock.list',
                    'product.stock.add',
                    'product.stock.update'
                ]
            ],
            [
                //report permission
                'group_name' => 'report',
                'permissions' => [
                    'sales.report',
                    'purchase.report',
                    'due.report',
                    'expense.report',
                    'stock.report'
                ]
            ],
            [
                //settings permission
                'group_name' => 'settings',
                'permissions' => [
                    'system.settings',
                ]
            ],
           

        ];

        // Create and  Assign Permissions

        for ($i=0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];
            for ($j=0; $j < count($permissions[$i]['permissions']); $j++) {
                 //create permission
                $permission = Permission::create([
                            'name' => $permissions[$i]['permissions'][$j],
                            'group_name' => $permissionGroup,
                            'guard_name' => 'admin'
                        ]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }

        }


         // Assign super admin role permission to superadmin user
         $admin = Admin::where('email', 'superadmin@example.com')->first();
         if ($admin) {
             $admin->assignRole($roleSuperAdmin);
         }

        
    }
}
