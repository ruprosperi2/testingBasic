<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagControllersTest extends TestCase
{
    use RefreshDatabase;

    public function testPost()
    {
        $this->post('/tags', ['name' => 'PHP'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function testDelete()
    {
        $tag = Tag::factory()->create();

        $this->delete("/tags/$tag->id")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags',[
            "id" => $tag->id,
            "name" => $tag->name,
            "created_at" => Date("Y-m-d	H:m:s"),
            "updated_at" => Date("Y-m-d	H:m:s")
        ]);
    }
}
