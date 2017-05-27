<?php

namespace Tests\Unit;

use Tests\TestCase;
use Facades\App\Num;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacadeTest extends TestCase
{
    // Auth Mock
    public function testAutoMock()
    {
        Cache::shouldReceive('get')->with('key')->once()->andReturn('value');

        $this->assertEquals('value', Cache::get('key'));
    }

    public function testAutoFacade()
    {
        $this->assertEquals(3.14159265359, Num::pi());
    }

    public function testAutoFacadeWithContainer()
    {
        $this->assertEquals('v0.0.1', Num::version());
    }
}
