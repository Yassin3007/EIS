<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'about_us',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'home',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'media_center',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'service',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'projects',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'careers',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'applicants',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'messages',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'request_info',
            'guard_name'=>'web'
        ]);
        Permission::create([
            'name'=>'seo',
            'guard_name'=>'web'
        ]);





        $hr = Role::where('name','HR')->first();
        $hr->givePermissionTo('careers');
        $hr->givePermissionTo('applicants');
        $Sales = Role::where('name','Sales')->first();
        $Sales->givePermissionTo('request_info');
        $Sales->givePermissionTo('messages');

        $admin= Role::where('name','admin')->first();
        $admin->givePermissionTo('about_us');
        $admin->givePermissionTo('home');
        $admin->givePermissionTo('media_center');
        $admin->givePermissionTo('service');
        $admin->givePermissionTo('projects');
        $admin->givePermissionTo('careers');
        $admin->givePermissionTo('applicants');
        $admin->givePermissionTo('messages');
        $admin->givePermissionTo('request_info');
        $admin->givePermissionTo('seo');

        $superadmin=Role::where('name','SuperAdmin')->first();
        $superadmin->givePermissionTo('about_us');
        $superadmin->givePermissionTo('home');
        $superadmin->givePermissionTo('media_center');
        $superadmin->givePermissionTo('service');
        $superadmin->givePermissionTo('projects');
        $superadmin->givePermissionTo('careers');
        $superadmin->givePermissionTo('applicants');
        $superadmin->givePermissionTo('messages');
        $superadmin->givePermissionTo('request_info');
        $superadmin->givePermissionTo('seo');

        $Fabrica=Role::where('name','Fabrica')->first();

        $Fabrica->givePermissionTo('about_us');
        $Fabrica->givePermissionTo('home');
        $Fabrica->givePermissionTo('media_center');
        $Fabrica->givePermissionTo('service');
        $Fabrica->givePermissionTo('projects');
        $Fabrica->givePermissionTo('careers');
        $Fabrica->givePermissionTo('applicants');
        $Fabrica->givePermissionTo('messages');
        $Fabrica->givePermissionTo('request_info');
        $Fabrica->givePermissionTo('seo');

    }
}
