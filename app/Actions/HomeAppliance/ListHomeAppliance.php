<?php

namespace App\Actions\HomeAppliance;

use App\Models\HomeAppliance;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListHomeAppliance
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(HomeAppliance::class)->allowedFilters(
            AllowedFilter::partial('name')
        )->orderBy('id')->paginate();
    }
}
