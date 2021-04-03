<?php namespace Tests\Repositories;

use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class FoodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var FoodRepository
     */
    protected $foodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->foodRepo = \App::make(FoodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_food()
    {
        $food = Food::factory()->make()->toArray();

        $createdFood = $this->foodRepo->create($food);

        $createdFood = $createdFood->toArray();
        $this->assertArrayHasKey('id', $createdFood);
        $this->assertNotNull($createdFood['id'], 'Created Food must have id specified');
        $this->assertNotNull(Food::find($createdFood['id']), 'Food with given id must be in DB');
        $this->assertModelData($food, $createdFood);
    }

    /**
     * @test read
     */
    public function test_read_food()
    {
        $food = Food::factory()->create();

        $dbFood = $this->foodRepo->find($food->id);

        $dbFood = $dbFood->toArray();
        $this->assertModelData($food->toArray(), $dbFood);
    }

    /**
     * @test update
     */
    public function test_update_food()
    {
        $food = Food::factory()->create();
        $fakeFood = Food::factory()->make()->toArray();

        $updatedFood = $this->foodRepo->update($fakeFood, $food->id);

        $this->assertModelData($fakeFood, $updatedFood->toArray());
        $dbFood = $this->foodRepo->find($food->id);
        $this->assertModelData($fakeFood, $dbFood->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_food()
    {
        $food = Food::factory()->create();

        $resp = $this->foodRepo->delete($food->id);

        $this->assertTrue($resp);
        $this->assertNull(Food::find($food->id), 'Food should not exist in DB');
    }
}
