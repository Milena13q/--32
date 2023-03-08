<?php

namespace App\ModelFilters;

use Revalto\ModelFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
     * @var array
     */
    protected array $defaults = [
        'id' => self::COMPOSITION_EQUAL,
        'address' => self::COMPOSITION_LIKE,
        'phone' => self::COMPOSITION_LIKE,
        'email' => self::COMPOSITION_LIKE,
        'position' => self::COMPOSITION_LIKE
    ];

    /**
     * @param string|null $value
     * @return void
     */
    public function name(?string $value)
    {
        $this->query->where(function ($builder) use ($value) {
            $builder->where('first_name', 'LIKE', '%' . $value . '%')
                ->orWhere('last_name', 'LIKE', '%' . $value . '%');
        });
    }

    /**
     * @param array|null $value
     * @return void
     */
    public function createdAt(?array $value): void
    {
        $this->query->whereBetween('created_at', [
            $value[0] ?? now()->subYears(100),
            $value[1] ?? now()->addYears(100)
        ]);
    }
}
