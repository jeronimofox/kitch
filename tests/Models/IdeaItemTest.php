<?php

namespace Tests\Models;

use App\Models\IdeaItem;
use Tests\TestCase;

class IdeaItemTest extends TestCase
{

    public function testIdea()
    {
        $item = IdeaItem::all()->random();
        $this->assertIsObject($item->idea);
    }
}
