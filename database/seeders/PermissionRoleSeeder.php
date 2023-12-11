<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // Role Admin
      $role_admin = Role::create(['name' => 'admin']);
      $admin_access_index = Permission::create(['name' => 'admin.access.index']);
      $admin_access_profile = Permission::create(['name' => 'admin.access.profile']);
      $admin_access_user = Permission::create(['name' => 'admin.access.user']);
      $admin_access_news = Permission::create(['name' => 'admin.access.news']);
      $admin_access_rencana_kerja = Permission::create(['name' => 'admin.access.rencana_kerja']);
      $admin_access_unit = Permission::create(['name' => 'admin.access.unit']);
      $admin_access_location = Permission::create(['name' => 'admin.access.location']);
      $admin_access_implement = Permission::create(['name' => 'admin.access.implement']);
      $admin_access_activity = Permission::create(['name' => 'admin.access.activity']);


      $role_admin->givePermissionTo($admin_access_index);
      $role_admin->givePermissionTo($admin_access_profile);
      $role_admin->givePermissionTo($admin_access_user);
      $role_admin->givePermissionTo($admin_access_news);
      $role_admin->givePermissionTo($admin_access_rencana_kerja);
      $role_admin->givePermissionTo($admin_access_unit);
      $role_admin->givePermissionTo($admin_access_location);
      $role_admin->givePermissionTo($admin_access_implement);
      $role_admin->givePermissionTo($admin_access_activity);

      // Role Operator
      $role_operator = Role::create(['name' => 'operator']);

      $role_operator->givePermissionTo($admin_access_index);
      $role_operator->givePermissionTo($admin_access_profile);
      $role_operator->givePermissionTo($admin_access_news);
      $role_operator->givePermissionTo($admin_access_rencana_kerja);
      $role_operator->givePermissionTo($admin_access_unit);
      $role_operator->givePermissionTo($admin_access_location);
      $role_operator->givePermissionTo($admin_access_implement);
      $role_operator->givePermissionTo($admin_access_activity);

      //role kassie
      $role_kassie = Role::create(['name' => 'kassie']);

      $role_kassie->givePermissionTo($admin_access_index);
      $role_kassie->givePermissionTo($admin_access_profile);
      $role_kassie->givePermissionTo($admin_access_news);
      $role_kassie->givePermissionTo($admin_access_rencana_kerja);
      $role_kassie->givePermissionTo($admin_access_unit);
      $role_kassie->givePermissionTo($admin_access_location);
      $role_kassie->givePermissionTo($admin_access_implement);
      $role_kassie->givePermissionTo($admin_access_activity);

      // Role User
      $role_user = Role::create(['name' => 'user']);
      $user_access_index = Permission::create(['name' => 'user.access.index']);

      $role_user->givePermissionTo($user_access_index);

      $admin = User::create([
         'name' => 'Administrator',
         'email' => 'admin@admin.com',
         'password' => bcrypt('secret'),
      ]);
      $admin->assignRole('admin');

      $kassie = User::create([
         'name' => 'Kassie',
         'email' => 'kassie@email.com',
         'password' => bcrypt('secret'),
      ]);
      $kassie->assignRole('kassie');

      $operator = User::create([
         'name' => 'Operator',
         'email' => 'operator@email.com',
         'password' => bcrypt('secret'),
      ]);
      $operator->assignRole('operator');

      $user = User::create([
         'name' => 'User Test',
         'email' => 'user@email.com',
         'password' => bcrypt('secret'),
      ]);
      $user->assignRole('user');
   }
}
