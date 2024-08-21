<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
           'name' => 'SuperAdmin',
           'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
         ]);
          Role::create([
            'name' => 'Fabrica',
            'guard_name' => 'web',
         ]);
         Role::create([
            'name' => 'HR',
            'guard_name' => 'web',
         ]);
         Role::create([
             'name' => 'Sales',
             'guard_name' => 'web',
          ]);
    }
}
