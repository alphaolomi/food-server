<?php namespace Tests\APIs;


use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FoodApiTest extends TestCase
{
    use RefreshDatabase;
    use ApiTestTrait;
//    use WithoutMiddleware;


    /**
     * @test
     */
    public function test_create_food()
    {
        $food = factory(Food::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/foods', $food
        );

        $this->assertApiResponse($food);
    }

    /**
     * @test
     */
    public function test_read_food()
    {
        $food = factory(Food::class)->create();

        $this->response = $this->json(
            'GET',
            'api/foods/'.$food->id
        );
dd($this->response->content());
        $this->assertApiResponse($food->toArray());
    }

    /**
     * @test
     */
    public function test_update_food()
    {
        $food = factory(Food::class)->create();
        $editedFood = factory(Food::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/foods/'.$food->id,
            $editedFood
        );

        $this->assertApiResponse($editedFood);
    }

    /**
     * @test
     */
    public function test_delete_food()
    {
        $food = factory(Food::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/foods/'.$food->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/foods/'.$food->id
        );

        $this->response->assertStatus(404);
    }
}
