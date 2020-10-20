<?php

namespace Tests\Models;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{

    public function testProjects()
    {
        $product = Product::all()->random();
        $this->assertIsObject($product->projects);
        $this->assertEquals($product->id, $product->projects()->first()->products()->first()->id);
    }
}
