<?php

namespace App\Models;

use Database\Factories\CatalogItemFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CatalogItem extends Model
{
    /** @use HasFactory<CatalogItemFactory> */
    use HasFactory;

    protected $fillable = [
        'store_id',
        'category_id',
        'name',
        'description',
        'price_cents',
        'is_available',
    ];

    protected function casts(): array
    {
        return [
            'price_cents' => 'integer',
            'is_available' => 'boolean',
        ];
    }

    /**
     * @return BelongsTo<Store, $this>
     */
    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
