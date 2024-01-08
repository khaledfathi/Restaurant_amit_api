<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUrlsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    
     //auth
    public function test_api_auth_login(): void
    {
        $response = $this->post('/api/auth/login');
        $response->assertStatus(200);
    }
    
    //orders
    public function test_api_order_index(): void
    {
        $response = $this->get('api/order');
        $response->assertStatus(200);
    }
    public function test_api_order_store(): void
    {
        $response = $this->post('/api/order');
        $response->assertStatus(200);
    }
    public function test_api_order_filter_by_user(): void
    {
        $response = $this->get('/api/order/filter-by-user/1');
        $response->assertStatus(200);
    }
    public function test_api_order_update(): void
    {
        $response = $this->post('/api/order/update/1');
        $response->assertStatus(200);
    }
    public function test_api_order_show(): void
    {
        $response = $this->get('/api/order/1');
        $response->assertStatus(200);
    }
    public function test_api_order_delete(): void
    {
        $response = $this->delete('/api/order/1');
        $response->assertStatus(200);
    }

    //products
    public function test_api_product_index(): void
    {
        $response = $this->get('/api/product');
        $response->assertStatus(200);
    }
    public function test_api_product_store(): void
    {
        $response = $this->post('/api/product');
        $response->assertStatus(401); 
    }
    public function test_api_product_update(): void
    {
        $response = $this->post('/api/product/update/1');
        $response->assertStatus(401); 
    }
    public function test_api_product_delete(): void
    {
        $response = $this->delete('/api/product/1');
        $response->assertStatus(401); 
    }
    public function test_api_product_show(): void
    {
        $response = $this->get('/api/product/1');
        $response->assertStatus(200);
    }
    public function test_api_product_filter_by_category_and_restaurant(): void
    {
        $response = $this->get('/api/product/filter-by-category/1/and-restaurant/1');
        $response->assertStatus(200);
    }
    public function test_api_product_filter_by_category(): void
    {
        $response = $this->get('/api/product/filter-by-category/1');
        $response->assertStatus(200);
    }
    public function test_api_product_filter_by_restaurant(): void
    {
        $response = $this->get('/api/product/filter-by-restaurant/1');
        $response->assertStatus(200);
    }

    //products category 
    public function test_api_product_category_index(): void
    {
        $response = $this->get('/api/product-category');
        $response->assertStatus(200);
    }
    public function test_api_product_category_store(): void
    {
        $response = $this->post('/api/product-category');
        $response->assertStatus(401);
    }
    public function test_api_product_category_update(): void
    {
        $response = $this->post('/api/product-category/update/1');
        $response->assertStatus(401);
    }
    public function test_api_product_category_show(): void
    {
        $response = $this->get('/api/product-category/');
        $response->assertStatus(200);
    }
    public function test_api_product_category_delete(): void
    {
        $response = $this->delete('/api/product-category/1');
        $response->assertStatus(401);
    }

    //restaurants
    public function test_api_restaurant_index(): void
    {
        $response = $this->get('/api/restaurant');
        $response->assertStatus(200);
    }
    public function test_api_restaurant_store(): void
    {
        $response = $this->post('/api/restaurant');
        $response->assertStatus(401);
    }
    public function test_api_restaurant_filter_by_category(): void
    {
        $response = $this->get('/api/restaurant/filter-by-category/');
        $response->assertStatus(200);
    }
    public function test_api_restaurant_update(): void
    {
        $response = $this->post('/api/restaurant/update/1');
        $response->assertStatus(401);
    }
    public function test_api_restaurant_show(): void
    {
        $response = $this->get('/api/restaurant/1');
        $response->assertStatus(200);
    }
    public function test_api_restaurant_(): void
    {
        $response = $this->delete('/api/restaurant/1');
        $response->assertStatus(401);
    }

    //restaurant categories
    public function test_api_restaurant_category_index(): void
    {
        $response = $this->get('/api/restaurant-category');
        $response->assertStatus(200);
    }
    public function test_api_restaurant_category_store(): void
    {
        $response = $this->post('/api/restaurant-category');
        $response->assertStatus(401);
    }
    public function test_api_restaurant_category_update(): void
    {
        $response = $this->post('/api/restaurant-category/update/1');
        $response->assertStatus(401);
    }
    public function test_api_restaurant_category_show(): void
    {
        $response = $this->get('/api/restaurant-category/1');
        $response->assertStatus(200);
    }
    public function test_api_restaurant_category_delete(): void
    {
        $response = $this->delete('/api/restaurant-category/1');
        $response->assertStatus(401);
    }

    //users
    public function test_api_user_index(): void
    {
        $response = $this->get('/api/user');
        $response->assertStatus(200);
    }
    public function test_api_user_store(): void
    {
        $response = $this->post('/api/user');
        $response->assertStatus(200);
    }
    public function test_api_user_update(): void
    {
        $response = $this->post('/api/user/update/1');
        $response->assertStatus(401);
    }
    public function test_api_user_show(): void
    {
        $response = $this->get('api/user/1');
        $response->assertStatus(200);
    }
    public function test_api_user_delete(): void
    {
        $response = $this->delete('api/user/1');
        $response->assertStatus(401);
    }
}
