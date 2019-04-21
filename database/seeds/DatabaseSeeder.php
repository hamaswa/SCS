<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
     $this->SeedPermission();
     $this->SeedRole();
     $this->SeedUser();


    }

    public function SeedUser(){
        $admin = Role::where('slug','administrator')->first();
        $developer = new User();
        $developer->name = 'Admin';
        $developer->username = 'admin';
        $developer->email = 'admin@example.com';
        $developer->password = bcrypt('admin@123$');
        $developer->save();
        $developer->roles()->attach($admin);
    }

    public function SeedRole(){
        $admin = new Role();
        $admin->slug = 'administrator';
        $admin->name = 'Site Administrator';
        $admin->save();

    }

    public function SeedPermission(){
        //$dev_role = Role::where('slug','developer')->first();
        //$manager_role = Role::where('slug', 'manager')->first();

        $add_dep = new Permission();
        $add_dep->slug = 'add-department';
        $add_dep->name = 'Add Departments';
        $add_dep->save();
       // $createTasks->roles()->attach($dev_role);

        $edit_dep = new Permission();
        $edit_dep->slug = 'edit-department';
        $edit_dep->name = 'Edit Department';
        $edit_dep->save();

        $delete_dep = new Permission();
        $delete_dep->slug = 'Delete-department';
        $delete_dep->name = 'Delete Department';
        $delete_dep->save();
    }
}
