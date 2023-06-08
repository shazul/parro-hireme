<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AvailablePositionsCalculator
{
    /**
     * Determine available positions in a company.
     */
    public function calculate(Company $company): void
    {
        $company->load(['positions' => function (Builder $query) {
            $query->whereNull('client_id');
        }]);

        $company->available_positions = $company->positions->count();
        $company->save();
    }
}
