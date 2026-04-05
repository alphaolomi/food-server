<?php

namespace App\Http\Resources;

use App\Models\OrderLine;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin OrderLine */
class OrderLineResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'catalog_item_id' => $this->catalog_item_id,
            'quantity' => $this->quantity,
            'unit_price_cents' => $this->unit_price_cents,
            'line_total_cents' => $this->quantity * $this->unit_price_cents,
            'item' => new CatalogItemResource($this->whenLoaded('catalogItem')),
        ];
    }
}
