<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deadline extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'deadline';

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_item_id',
        'developer_id',
        'started_at',
        'finished_at'
    ];

    /**
     * @return HasOne
     */
    public function developer(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'developer_id');
    }
}
