<?php

namespace Tests\Models;

use App\Models\Idea;
use Tests\TestCase;

class IdeaTest extends TestCase
{

    public function testAuthor()
    {
        $item = Idea::all()->random();
        $this->assertIsObject($item->author);
    }

    public function testItems()
    {
        $item = Idea::all()->random();
        $this->assertIsObject($item->items);
    }

    public function testProject()
    {
        $item = Idea::all()->random();
        $this->assertIsObject($item->project);
    }
}
