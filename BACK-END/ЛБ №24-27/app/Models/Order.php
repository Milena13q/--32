<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Revalto\ModelFilter\Traits\ModelFilterTrait;

class Order extends Model
{
    use HasFactory, ModelFilterTrait;

    /**
     * @var string
     */
    protected $table = 'orders';

    /**
     * @var string[]
     */
    protected $fillable = [
        'client_id',
        'status',
        'price'
    ];

    /**
     * @return HasOne
     */
    public function client(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    /**
     * @return HasMany
     */
    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }
}
