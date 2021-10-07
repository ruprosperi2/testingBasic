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
        $this->withoutExceptionHandling();

        $tag = Tag::factory()->create();

        $this->delete("/tags/$tag->id")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags',[
            'name' => $tag->name,
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
        ]);

    }

    public function testValidate()
    {
        $this->post('/tags', ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
