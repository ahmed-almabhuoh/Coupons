<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Building Permissions
        $permissions = [
            // Admins
            'create-admin' => 'إنشاء مدير',
            'edit-admin' => 'تعديل مدير',
            'delete-admin' => 'حذف مدير',
            'view-admins' => 'عرض المدراء',

            // Users
            'create-user' => 'إنشاء مستخدم',
            'edit-user' => 'تعديل مستخدم',
            'delete-user' => 'حذف مستخدم',
            'view-users' => 'عرض المستخدمين',

            // Categories
            'create-category' => 'إنشاء فئة',
            'edit-category' => 'تعديل فئة',
            'delete-category' => 'حذف فئة',
            'view-categories' => 'عرض الفئات',

            // Store
            'create-store' => 'إنشاء متجر',
            'edit-store' => 'تعديل متجر',
            'delete-store' => 'حذف متجر',
            'view-stores' => 'عرض المتاجر',

            // Coupons
            'create-coupon' => 'إنشاء كوبون',
            'edit-coupon' => 'تعديل كوبون',
            'delete-coupon' => 'حذف كوبون',
            'view-coupons' => 'عرض الكوبونات',

            // Products
            'create-product' => 'إنشاء منتج',
            'edit-product' => 'تعديل منتج',
            'delete-product' => 'حذف منتج',
            'view-products' => 'عرض المنتجات',

            // A&Qs
            'create-A&Q' => 'إنشاء سؤال وجواب',
            'edit-A&Q' => 'تعديل سؤال وجواب',
            'delete-A&Q' => 'حذف سؤال وجواب',
            'view-A&Qs' => 'عرض الأسئلة والأجوبة',

            // Offers
            'create-offer' => 'إنشاء عرض',
            'edit-offer' => 'تعديل عرض',
            'delete-offer' => 'حذف عرض',
            'view-offers' => 'عرض العروض',

            // Blogs
            'create-blog' => 'إنشاء مدونة',
            'edit-blog' => 'تعديل مدونة',
            'delete-blog' => 'حذف مدونة',
            'view-blogs' => 'عرض المدونات',

            // Articles
            'create-article' => 'إنشاء مقال',
            'edit-article' => 'تعديل مقال',
            'delete-article' => 'حذف مقال',
            'view-articles' => 'عرض المقالات',

            // Website management
            'manage-website' => 'إدارة الموقع',

            // Roles
            'create-role' => 'إنشاء دور',
            'edit-role' => 'تعديل دور',
            'delete-role' => 'حذف دور',
            'view-roles' => 'عرض الأدوار',
            'assign-permissions' => 'تعيين الصلاحيات',

            // Contact Us
            'contact-us' => 'اتصل بنا',
        ];

        $permissions_en = [
            // Admins
            'create-admin',
            'edit-admin',
            'delete-admin',
            'view-admins',

            // Users
            'create-user',
            'edit-user',
            'delete-user',
            'view-users',

            // Categories
            'create-category',
            'edit-category',
            'delete-category',
            'view-categories',

            // Store
            'create-store',
            'edit-store',
            'delete-store',
            'view-stores',

            // Coupons
            'create-coupon',
            'edit-coupon',
            'delete-coupon',
            'view-coupons',

            // Products
            'create-product',
            'edit-product',
            'delete-product',
            'view-products',

            // A&Qs
            'create-A&Q',
            'edit-A&Q',
            'delete-A&Q',
            'view-A&Qs',
            // Offers
            'create-offer',
            'edit-offer',
            'delete-offer',
            'view-offers',

            // Blogs
            'create-blog',
            'edit-blog',
            'delete-blog',
            'view-blogs',

            // Articles
            'create-article',
            'edit-article',
            'delete-article',
            'view-articles',

            // Website management
            'manage-website',

            // Roles
            'create-role',
            'edit-role',
            'delete-role',
            'view-roles',
            'assign-permissions',

            // Contact Us
            'contact-us'
        ];

        foreach ($permissions as $name => $name_ar) {
            Permission::create(['name' => $name, 'name_ar' => $name_ar, 'guard_name' => 'admin']);
        }

        // Create admin role
        $adminRole = Role::create(['name' => 'Super Manager', 'guard_name' => 'admin']);

        // Assign all permissions to admin role
        $adminRole->syncPermissions($permissions_en);

        $admin = Admin::create(['fname' => 'Coupons', 'lname' => 'PS', 'email' => 'coupons@auto.com.ps', 'phone' => '+9725670776531', 'image' => 'admins/O6wAe8jPxHMBMATiNwFGjxR4t9xGjSQ00G9LXSQf.jpg', 'password' => '$2y$10$U/7Tlc/oCtBPfXXLwh7VcOXtHvV4AnYS8ccFBjwrxGyPYaoL/xq.K']);

        $admin->assignRole($adminRole);
    }
}
