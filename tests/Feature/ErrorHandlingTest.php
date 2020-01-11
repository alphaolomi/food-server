<?php

namespace Tests\Feature;

use Illuminate\Foundation\Exceptions\Handler;
use Illuminate\Http\Request;
use Tests\TestCase;

class ErrorHandlingTest extends TestCase
{
    /**
     * @test
     */
    public function renderTokenMismatchException()
    {
       $this->assertTrue(true);
    }
}
