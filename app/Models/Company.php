<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }

    protected function budgetDisplay(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => '$' . number_format($attributes['budget'], 0),
        );
    }
}
