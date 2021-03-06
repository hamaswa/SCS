<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Position;
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
        $this->SeedRole(['admin1','Admin 1']);
        $this->SeedRole(['admin2','Admin 2']);
        $this->SeedRole(['admin3','Admin 3']);
        $this->SeedRole(['executor','Executor']);
        $this->SeedRole(['originator','Originator']);
        $this->SeedRole(['maker','Maker']);
        $this->SeedRole(['checker','Checker']);
        $this->SeedRole(['uploader','Uploader']);
        $this->SeedRole(['requestor','Requestor']);
        $this->SeedRole(['processor','Processor']);
        $this->SeedRole(['data_entry','Data Entry']);

        $this->SeedPosition(['advisor','Advisor']);
        $this->SeedPosition(['exective_advisor','Executive Advisor']);
        $this->SeedPosition(['business_associate','Business Associate']);
        $this->SeedPosition(['associate_partner','Associate Partner']);
        $this->SeedPosition(['partner','Partner']);

        $this->SeedUser("Administrator", "admin@domain.com", "admin", "admin@123$");
       // $this->SeedUser("Admin2", "hama_swa2@yahoo.com", "admin2", "admin@123$");
        //$this->SeedUser("Admin3", "hama_swa3@yahoo.com", "admin3", "admin@123$");
        //$this->SeedUser("100001", "example1@test.commm", "100001", "MY100001");
       // $this->SeedUser("100002", "example2@test.commm", "100002", "MY100002");
//        $this->SeedUser("100003", "example3@test.commm", "100003", "MY100003", "executor");
//        $this->SeedUser("100003", "example4@test.commm", "100004", "MY100004", "executor");


    }

    public function SeedUser($name,$email,$username,$pass){
        $roles = Role::all();
        $user = new User();
        $user->first_name = $name;
        $user->username = $username;
        $user->email = $email;
        $user->password = bcrypt($pass);
        $user->position_id=1;
        $user->save();
        foreach ($roles as $role) {
            $user->roles()->attach($role);
        }
    }


    public function SeedRole($role)
    {
        Role::create(['slug'=>$role[0],'name'=>$role[1]]);
    }

    public function SeedPosition($position)
    {
        Position::create(['slug'=>$position[0],'name'=>$position[1]]);
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
