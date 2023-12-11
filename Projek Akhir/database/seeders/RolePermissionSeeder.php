<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'add-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'delete-user']);
        Permission::create(['name'=>'view-user']);

        Permission::create(['name'=>'add-product']);
        Permission::create(['name'=>'edit-product']);
        Permission::create(['name'=>'delete-product']);
        Permission::create(['name'=>'view-product']);

        Permission::create(['name'=>'add-store']);
        Permission::create(['name'=>'edit-store']);
        Permission::create(['name'=>'delete-store']);
        Permission::create(['name'=>'view-store']);

        Permission::create(['name'=>'buy-product']);
        Permission::create(['name'=>'add-to-cart']);
        Permission::create(['name'=>'add-to-favorite']);

        Role::create(['name'=>'admin']);
        Role::create(['name'=>'seller']);
        Role::create(['name'=>'buyer']);

        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('add-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');
        $roleAdmin->givePermissionTo('view-user');
        $roleAdmin->givePermissionTo('add-product');
        $roleAdmin->givePermissionTo('edit-product');
        $roleAdmin->givePermissionTo('delete-product');
        $roleAdmin->givePermissionTo('view-product');
        $roleAdmin->givePermissionTo('add-store');
        $roleAdmin->givePermissionTo('edit-store');
        $roleAdmin->givePermissionTo('delete-store');
        $roleAdmin->givePermissionTo('view-store');

        $roleSeller = Role::findByName('seller');
        $roleSeller->givePermissionTo('add-product');
        $roleSeller->givePermissionTo('edit-product');
        $roleSeller->givePermissionTo('delete-product');
        $roleSeller->givePermissionTo('view-product');
        $roleSeller->givePermissionTo('add-store');
        $roleSeller->givePermissionTo('edit-store');
        $roleSeller->givePermissionTo('delete-store');
        $roleSeller->givePermissionTo('view-store');

        $roleBuyer = Role::findByName('buyer');
        $roleBuyer->givePermissionTo('buy-product');
        $roleBuyer->givePermissionTo('add-to-cart');
        $roleBuyer->givePermissionTo('add-to-favorite');
    }
}
