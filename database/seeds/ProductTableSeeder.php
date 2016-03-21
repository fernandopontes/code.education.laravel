<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach(range(1,10) as $i)
        {
            Product::create([
                'name'  =>  $faker->name(),
                'description'  =>  $faker->sentence(),
                'price'   => $faker->unique()->randomDigit . '000',
                'featured' => 1,
                'recommend' => 0
            ]);
        }
    }
}