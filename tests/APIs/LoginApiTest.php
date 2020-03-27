<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;


class LoginApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;


}
