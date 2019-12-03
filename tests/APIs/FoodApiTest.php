<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeFoodTrait;
use Tests\ApiTestTrait;

class FoodApiTest extends TestCase
{
    use MakeFoodTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_food()
    {
        $food = $this->fakeFoodData();
        $this->response = $this->json('POST', '/api/v1/foods', $food);

        $this->assertApiResponse($food);
    }

    /**
     * @test
     */
    public function test_read_food()
    {
        $food = $this->makeFood();
        $this->response = $this->json('GET', '/api/v1/foods/' . $food->id);

        $this->assertApiResponse($food->toArray());
    }

    /**
     * @test
     */
    public function test_update_food()
    {
        $food = $this->makeFood();
        $editedFood = $this->fakeFoodData();

        $this->response = $this->json('PUT', '/api/v1/foods/' . $food->id, $editedFood);

        $this->assertApiResponse($editedFood);
    }

    /**
     * @test
     */
    public function test_delete_food()
    {
        $food = $this->makeFood();
        $this->response = $this->json('DELETE', '/api/v1/foods/' . $food->id);

        $this->assertApiSuccess();
        $this->response = $this->json('GET', '/api/v1/foods/' . $food->id);

        $this->response->assertStatus(404);
    }
}
