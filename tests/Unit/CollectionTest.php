<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CollectionTest extends TestCase
{
    public function testHeigherOrderMessages()
    {
        $this->assertEquals(
            ['secret', 'secret', 'secret'],
            factory(User::class, 3)->make()->map->age->toArray()
        );
    }

    public function testMacroable()
    {
        $this->assertEquals(120, collect(range(1, 5))->product());
    }
}
