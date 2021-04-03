<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFoodAPIRequest;
use App\Http\Requests\API\UpdateFoodAPIRequest;
use App\Models\Food;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\FoodResource;
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
     * @OA\Get(
     *      path="/food",
     *      summary="Get a listing of the Food.",
     *      tags={"Food"},
     *      description="Get all Food",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/FoodResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function index(Request $request)
    {
        $food = $this->foodRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse(FoodResource::collection($food), 'Food retrieved successfully');
    }

    /**
     * @param CreateFoodAPIRequest $request
     * @return Response
     *
     * @OA\Post(
     *      path="/food",
     *      summary="Store a newly created Food in storage",
     *      tags={"Food"},
     *      description="Store Food",
     *      @OA\Parameter(
     *          name="body",
     *          in="body",
     *          description="Food that should be stored",
     *          required=false,
     *          @OA\Schema(ref="#/definitions/Food")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @OA\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      ),
     *   @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(CreateFoodAPIRequest $request)
    {
        $input = $request->all();

        $food = $this->foodRepository->create($input);

        return $this->sendResponse(new FoodResource($food), 'Food saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Get(
     *      path="/food/{id}",
     *      summary="Display the specified Food",
     *      tags={"Food"},
     *      description="Get Food",
     *      produces={"application/json"},
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @OA\Property(
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

        return $this->sendResponse(new FoodResource($food), 'Food retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFoodAPIRequest $request
     * @return Response
     *
     * @OA\Put(
     *      path="/food/{id}",
     *      summary="Update the specified Food in storage",
     *      tags={"Food"},
     *      description="Update Food",
     *      produces={"application/json"},
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Parameter(
     *          name="body",
     *          in="body",
     *          description="Food that should be updated",
     *          required=false,
     *          @OA\Schema(ref="#/definitions/Food")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  ref="#/definitions/Food"
     *              ),
     *              @OA\Property(
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

        return $this->sendResponse(new FoodResource($food), 'Food updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @OA\Delete(
     *      path="/food/{id}",
     *      summary="Remove the specified Food from storage",
     *      tags={"Food"},
     *      description="Delete Food",
     *      produces={"application/json"},
     *      @OA\Parameter(
     *          name="id",
     *          description="id of Food",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @OA\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @OA\Property(
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
