<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Revalto\ModelFilter\Traits\ModelFilterTrait;

class Product extends Model
{
    use HasFactory, ModelFilterTrait;

    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'price',
    ];

    /**
     * @return HasOne
     */
    public function orderItems(): HasOne
    {
        return $this->hasOne(OrderItem::class, 'product_id', 'id');
    }
}
