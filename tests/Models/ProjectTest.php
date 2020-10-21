<?php

namespace Tests\Models;

use App\Models\Idea;
use App\Models\Product;
use App\Models\Project;
use App\Models\ProjectItem;
use App\Models\ProjectMember;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    public function testGetAllProjects()
    {
        $this->assertIsObject((new Project)->all()->each(fn(Project $project) => $this->assertIsObject($project)));
    }

    public function testGetProjectById()
    {
        $randomId = rand(Project::all()->first()->id, Project::all()->count());
        $project = Project::find($randomId);

        $this->assertIsObject($project);
        $this->assertIsString($project->name);
        $this->assertIsArray($project->toArray());
    }

    /**
     * test $user->teams relationship
     */
    public function testMembers()
    {
        $project = Project::all()->random();

        $projectMembersDirty = ProjectMember::where([
            'project_id' => $project->id,
        ])->get('user_id');

        $projectMemberships = $project->members;

        $member = $projectMemberships->random();

        $this->assertGreaterThan(0, ProjectMember::where([
            'user_id' => $member->id,
            'project_id' => $project->id,
        ])->count());


        $this->assertIsArray($projectMembersDirty->toArray());
        $this->assertNotEmpty($projectMembersDirty);

        $this->assertIsArray($projectMemberships->toArray());
        $this->assertNotEmpty($projectMemberships);
        $this->assertEquals($projectMembersDirty->count(), $projectMemberships->count());
    }

    public function testIdea()
    {
        $project = Project::all()->random();
        $this->assertIsObject($project->idea);
        $this->assertNotNull($project->idea()->findOrNew(Idea::factory()->definition()));
        $this->assertEquals($project->id, $project->idea()->project->id);
    }

    public function testProducts()
    {
        $project = Project::all()->random();
        $this->assertIsObject($project->products);
        $this->assertNotNull($project->products()->findOrNew(Product::factory()->definition()));

        $this->assertContainsEquals(
            $project->id,
            $project->products()->each(fn($product) => $product->projects()->each(fn($project) => $project->id))
        );
    }

    public function testItems()
    {
        $project = Project::all()->random();
        $this->assertIsObject($project->items);
        $this->assertNotNull($project->items()->findOrNew(ProjectItem::factory()->definition()));
        $this->assertEquals($project->id, $project->items()->first()->project->id);
    }
}
