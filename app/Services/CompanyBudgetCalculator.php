<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CompanyBudgetCalculator
{
    /**
     * Check company has enough budget to hire a client.
     */
    public function hasEnoughBudgetToHire(Company $company, int $amount): bool
    {
        // get all occupied positions' salary
        $company->load(['positions' => function (Builder $query) {
            $query->whereNotNull('client_id');
        }]);

        if ($company->budget >= ($company->positions->sum('salary') + $amount)) {
            return true;
        }
        return false;
    }

    /**
     * Check company has enough budget to add a new position.
     */
    public function hasEnoughBudgetForNewPositions(Company $company, int $amount): bool
    {
        $company->load(['positions']);

        if ($company->budget >= ($company->positions->sum('salary') + $amount)) {
            return true;
        }
        return false;
    }
}
