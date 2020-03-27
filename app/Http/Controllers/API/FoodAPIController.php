<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFoodAPIRequest;
use App\Http\Requests\API\UpdateFoodAPIRequest;
use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FoodController
 * @package App\Http\Controllers\API
 */

class FoodAPIController extends AppBaseController
{
    /** @var  FoodRepository */
    private $foodRepository;

    public function __construct(FoodRepository $foodRepo)
    {
        $this->foodRepository = $foodRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/foods",
     *      summary="Get a listing of the Foods.",
     *      tags={"Food"},
     *      description="Get all Foods",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Food")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $foods = $this->foodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($foods->toArray(), 'Foods retrieved successfully');
    }

    /**
     * @param CreateFoodAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/foods",
     *      summary="Store a newly created Food in storage",
     *      tags={"Food"},
     *      description="Store Food",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Food that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Food")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFoodAPIRequest $request)
    {
        $input = $request->all();

        $food = $this->foodRepository->create($input);

        return $this->sendResponse($food->toArray(), 'Food saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/foods/{id}",
     *      summary="Display the specified Food",
     *      tags={"Food"},
     *      description="Get Food",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        return $this->sendResponse($food->toArray(), 'Food retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFoodAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/foods/{id}",
     *      summary="Update the specified Food in storage",
     *      tags={"Food"},
     *      description="Update Food",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Food that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Food")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFoodAPIRequest $request)
    {
        $input = $request->all();

        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        $food = $this->foodRepository->update($input, $id);

        return $this->sendResponse($food->toArray(), 'Food updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/foods/{id}",
     *      summary="Remove the specified Food from storage",
     *      tags={"Food"},
     *      description="Delete Food",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var Food $food */
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            return $this->sendError('Food not found');
        }

        $food->delete();

        return $this->sendSuccess('Food deleted successfully');
    }
}
