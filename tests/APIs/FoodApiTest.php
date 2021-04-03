<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Food;

class FoodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_food()
    {
        $food = Food::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/food', $food
        );

        $this->assertApiResponse($food);
    }

    /**
     * @test
     */
    public function test_read_food()
    {
        $food = Food::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/food/'.$food->id
        );

        $this->assertApiResponse($food->toArray());
    }

    /**
     * @test
     */
    public function test_update_food()
    {
        $food = Food::factory()->create();
        $editedFood = Food::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/food/'.$food->id,
            $editedFood
        );

        $this->assertApiResponse($editedFood);
    }

    /**
     * @test
     */
    public function test_delete_food()
    {
        $food = Food::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/food/'.$food->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/food/'.$food->id
        );

        $this->response->assertStatus(404);
    }
}
