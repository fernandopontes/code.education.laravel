<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'is_admin' => 1
        ]);

        $faker = Faker::create();

        foreach(range(1,10) as $i)
        {
            User::create([
                'name'  =>  $faker->name(),
                'email'  =>  $faker->email(),
                'password'   => Hash::make($faker->word()),
                'is_admin' => 0
            ]);
        }

        //factory('CodeCommerce\User', 10)->make();
        //factory('CodeCommerce\User', 10)->create();
    }
}