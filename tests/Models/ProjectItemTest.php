<?php

namespace Tests\Models;

use App\Models\ProjectItem;
use Tests\TestCase;

class ProjectItemTest extends TestCase
{

    public function testProject()
    {
        $item = ProjectItem::all()->random();
        $this->assertIsObject($item->project);
    }
}
