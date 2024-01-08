<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //users
        $json = File::get("database/seeders/data/users.json");
        $users = json_decode($json);
        foreach ($users as $user) {
            \App\Models\User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
            ]);
        }

        //restaurant categories 
        $json = File::get("database/seeders/data/restaurantCategories.json");
        $restaurantCategories = json_decode($json);
        foreach ($restaurantCategories as $restaurantCategory) {
            \App\Models\RestaurantCategoryModel::create([
                'name' => $restaurantCategory->name,
                'image' => $restaurantCategory->image,
            ]);
        }

        //restaurant categories 
        $json = File::get("database/seeders/data/restaurants.json");
        $restaurants = json_decode($json);
        foreach ($restaurants as $restaurants) {
            \App\Models\RestaurantModel::create([
                "restaurant_category_id" => $restaurants->restaurant_category_id,
                "name" => $restaurants->name,
                "address" => $restaurants->address,
                "phone" => $restaurants->phone,
                "lat" => $restaurants->lat,
                "long" => $restaurants->long,
                "image" => $restaurants->image,
            ]);
        }
        // //product categories 
        $json = File::get("database/seeders/data/productCategories.json");         
        $productCategories = json_decode($json); 
        foreach ($productCategories as $productCategorie) {
            \App\Models\ProductCategoryModel::create([
                'name' => $productCategorie->name,
                // 'image' 
            ]);
        }

        // //products 
        $json = File::get("database/seeders/data/products.json");         
        $products = json_decode($json); 
        foreach ($products as $product) {
            \App\Models\ProductModel::create([
                "product_category_id" => $product->product_category_id,
                "restaurant_id" => $product->restaurant_id,
                "name" => $product->name,
                "quantity" => $product->quantity,
                "price" => $product->price,
                "discount" => $product->discount ,
                "image" => $product->image ?? DEFAULT_PRODUCT_IMAGE
            ]);
        }

    }
}
