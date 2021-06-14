<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = Admin::create([
        	'admin_name' => 'nuongadmin',
        	'admin_email' => 'nuongadmin@gmail.com',
        	'admin_phone' => '1234536789',
        	'admin_password' => md5('123456')
        ]);

        $author = Admin::create([
        	'admin_name' => 'nuongauthor',
        	'admin_email' => 'nuongauthor@gmail.com',
        	'admin_phone' => '1234356789',
        	'admin_password' => md5('123456')
        ]);

        $user = Admin::create([
        	'admin_name' => 'nuonguser',
        	'admin_email' => 'nuonguser@gmail.com',
        	'admin_phone' => '123456789',
        	'admin_password' => md5('123456')
        ]);

        //admin->roles(quyền : nuongadmin)->attach : mang quyền adminRoles
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

        // factory(App\Admin::class, 20)->create();

    }
}
