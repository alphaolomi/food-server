<?php

namespace App\Http\Controllers;

use App\DataTables\FoodDataTable;
use App\Http\Requests\CreateFoodRequest;
use App\Http\Requests\UpdateFoodRequest;
use App\Repositories\FoodRepository;
use App\Http\Controllers\AppBaseController;
use Response;

class FoodController extends AppBaseController
{
    /** @var  FoodRepository */
    private $foodRepository;

    public function __construct(FoodRepository $foodRepo)
    {
        $this->foodRepository = $foodRepo;
    }

    /**
     * Display a listing of the Food.
     *
     * @param FoodDataTable $foodDataTable
     * @return Response
     */
    public function index(FoodDataTable $foodDataTable)
    {
        return $foodDataTable->render('food.index');
    }

    /**
     * Show the form for creating a new Food.
     *
     * @return Response
     */
    public function create()
    {
        return view('food.create');
    }

    /**
     * Store a newly created Food in storage.
     *
     * @param CreateFoodRequest $request
     *
     * @return Response
     */
    public function store(CreateFoodRequest $request)
    {
        $input = $request->all();

        $food = $this->foodRepository->create($input);

        toast('Food saved successfully.','success');

        return redirect(route('food.index'));
    }

    /**
     * Display the specified Food.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            toast('Food not found','error');

            return redirect(route('food.index'));
        }

        return view('food.show')->with('food', $food);
    }

    /**
     * Show the form for editing the specified Food.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            toast('Food not found','error');

            return redirect(route('food.index'));
        }

        return view('food.edit')->with('food', $food);
    }

    /**
     * Update the specified Food in storage.
     *
     * @param  int              $id
     * @param UpdateFoodRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFoodRequest $request)
    {
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            toast('Food not found','error');

            return redirect(route('food.index'));
        }

        $food = $this->foodRepository->update($request->all(), $id);

        toast('Food updated successfully.','success');

        return redirect(route('food.index'));
    }

    /**
     * Remove the specified Food from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $food = $this->foodRepository->find($id);

        if (empty($food)) {
            toast('Food not found','error');

            return redirect(route('food.index'));
        }

        $this->foodRepository->delete($id);

        toast('Food deleted successfully.','success');

        return redirect(route('food.index'));
    }
}
