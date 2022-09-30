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

        User::withoutEvents(function (){

            User::create([
                'name' => 'Administrator',
                'email' => 'admin@admin.com',
                'phone' => '01099647084',
                'photo' => 'assets/dashboard/img/AdminLTELogo.png',
                'password' => Hash::make("admin"),
            ]);

            User::factory()->count(50)->create();

            foreach (User::whereKeyNot(1)->get() as $user){
                $user->roles()->attach([2]);
            }
        });
    }
}
