<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function user_get_products()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products');
        $response->assertViewIs('products.index');
        $response->assertSee($product->name);
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_read_a_single_product()
    {
        $product = Product::factory()->create();
        $response = $this->get('/products/' . $product->id);
        $response->assertViewIs('products.show');
        $response->assertSee($product->name)
            ->assertSee($product->desc);
        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_create_a_new_product()
    {
        $product = Product::factory()->make()->toArray();
        $response = $this->post('/products/create', $product);
        $this->assertDatabaseHas('products', $product);
        $response->assertRedirect('/products');
    }

     /** @test */
     public function user_can_update_a_product()
     {
        $product = Product::factory()->create();
        // $product['name'] = 'abc';
        $response = $this->put(route('update', ['product' => $product]), $product->toArray());
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);
     }

     /** @test */

     public function user_can_delete_a_product()
     {
        $product = Product::factory()->create();
        $response = $this->delete(route('delete', ['product' => $product]), $product->toArray());
        $response->assertRedirect(route('home'));
        $response->assertStatus(302);
     }

}
