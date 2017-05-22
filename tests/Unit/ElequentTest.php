<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ElequentTest extends TestCase
{
    use DatabaseMigrations;

    // Query Scopes
    public function testQueryScopes()
    {
        $user = factory(User::class)->create(['name' => 'admin']);

        $this->assertTrue(User::isAdmin()->first()->is($user));
    }

    // Accessors & Mutators
    public function testGetAttribute()
    {
        $user = new User;

        $this->assertEquals('secret', $user->age);
    }

    public function testSetAttribute()
    {
        $user = new User;

        $user->permissions = 'rwxr-xr-x';

        $this->assertEquals(0755, $user->permissions);
    }

    // Appending Values To JSON
    public function testAppendingValue()
    {
        $user = factory(User::class)->create();

        $this->assertContains('age', array_keys($user->toArray()));
    }

    // Route Model Binding
    public function testRouteModelBinding()
    {
        $user = factory(User::class)->create();

        $response = $this->get("users/{$user->id}");

        $response->assertJson($user->toArray());
    }

    // Customizing The Key Name
    public function testRouteModelBindingByCustomKey()
    {
        $post = factory(Post::class)->create();

        $response = $this->get("posts/{$post->slug}");

        $response->assertJson($post->toArray());
    }
}
