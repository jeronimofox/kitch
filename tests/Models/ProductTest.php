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
        $project = $product->projects->first();
        dumP($project->products);
        $this->assertEquals($product->id, $project->products->first()->id);
    }

    public function testProject()
    {
        $product = Product::all()->random();
    }
}
