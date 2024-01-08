<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlsTest extends TestCase
{
    public function test_url_root (){
        $response = $this->get('/'); 
        $response->assertStatus(200); 
    }
    public function test_url_user(){
        $response = $this->get('/user'); 
        $response->assertStatus(200); 
    }
    
    //restaurants
    public function test_url_restaurant(){
        $response = $this->get('/restaurant');
        $response->assertStatus(200); 
    }
    public function test_url_restaurant_category(){
        $response = $this->get('/restaurant/category');
        $response->assertStatus(200); 
    }

    public function test_url_product(){
        $response = $this->get('/product'); 
        $response->assertStatus(200); 
    }
    public function test_url_product_category(){
        $response = $this->get('/product/category'); 
        $response->assertStatus(200); 
    }
    //order
    public function test_url_order(){
        $response = $this->get('/order'); 
        $response->assertStatus(200); 
    } 
    public function test_url_order_full_details(){
        $response = $this->get('/order/full-details/1'); 
        $response->assertStatus(200); 
    } 


    //example urls
    public function test_url_example_order_create(){
        $response = $this->get('/example/order-create'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_delete(){
        $response = $this->get('/example/order-delete'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_order_filter_by_user(){
        $response = $this->get('/example/order-filter-by-user'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_order_list(){
        $response = $this->get('/example/order-list'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_order_single(){
        $response = $this->get('/example/order-single'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_order_update(){
        $response = $this->get('/example/order-update'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_category_create(){
        $response = $this->get('/example/product-category-create'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_category_delete(){
        $response = $this->get('/example/product-category-delete'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_category_list(){
        $response = $this->get('/example/product-category-list'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_category_single(){
        $response = $this->get('/example/product-category-single'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_category_update(){
        $response = $this->get('/example/product-category-update'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_create(){
        $response = $this->get('/example/product-create'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_delete(){
        $response = $this->get('/example/product-delete'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_filter_by_category(){
        $response = $this->get('/example/product-filter-by-category'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_filter_by_category_and_restaurant(){
        $response = $this->get('/example/product-filter-by-category-and-restaurant'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_filter_by_restaurant(){
        $response = $this->get('/example/product-filter-by-restaurant'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_list(){
        $response = $this->get('/example/product-list'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_single(){
        $response = $this->get('/example/product-single'); 
        $response->assertStatus(200); 
    }
    public function test_url_example_prodcut_update(){
        $response = $this->get('/example/product-update'); 
        $response->assertStatus(200); 
    }
    
}
