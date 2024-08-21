<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
           'name' => 'Admin',
           'email' => 'admin@skeleton.com',
           'password' => Hash::make('123456'), 
        ]);
        $user->assignRole('SuperAdmin');

        $user = User::create([
            'name' => 'Fabrica',
            'email' => 'admin@Fabrica.com',
            'password' => Hash::make('fabricaCS@123'),
         ]);
         $user->assignRole('Fabrica');
    }
}
