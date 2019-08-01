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
        $this->SeedUser("100001","example1@test.commm","100001","MY100001","user");
        $this->SeedUser("100002","example2@test.commm","100002","MY100002","user");
        $this->SeedUser("100003","example3@test.commm","100003","MY100003","user");
        $this->SeedUser("100003","example4@test.commm","100004","MY100004","user");


    }

    public function SeedUser($name,$email,$username,$pass,$role){
        $role = Role::where('slug',$role)->first();
        $user = new User();
        $user->name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($pass);
        $user->save();
        $user->roles()->attach($role);
    }


    public function SeedRole(){
        $admin = new Role();
        $admin->create([
            'slug'=>'administrator',
            'name'=>'Site Administrator'
        ]);
        $admin->create([
            'slug'=>'admin',
            'name'=>'Admin'
        ]);$admin->create([
            'slug'=>'supervoiser',
            'name'=>'Supervoiser'
        ]);
        $admin->create([
            'slug'=>'user',
            'name'=>'User'
        ]);
        $admin->create([
            'slug'=>'agent',
            'name'=>'Agent'
        ]);


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
