<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\Controller;

class DemoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    protected $obj;

    public function __construct(Controller $controller){
        $this->obj = $controller;
    }

    public function test_demo()
    {   
        $this->assertEquals($this->obj->searchFromJson(2000),5);
    }
}
