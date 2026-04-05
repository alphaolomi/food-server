<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use App\Models\Store;
use Dedoc\Scramble\Attributes\Endpoint;
use Dedoc\Scramble\Attributes\Group;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

#[Group('Stores', 'Store discovery and catalog.', weight: 1)]
class StoreDirectoryController extends Controller
{
    #[Endpoint(operationId: 'listStores', title: 'List stores', description: 'Paginated list of all stores.')]
    public function index(Request $request): JsonResponse
    {
        $perPage = min(max((int) $request->query('per_page', 15), 1), 100);

        $paginator = Store::query()
            ->with('organization:id,name,slug')
            ->orderBy('name')
            ->paginate($perPage);

        return StoreResource::collection($paginator)->response();
    }
}
