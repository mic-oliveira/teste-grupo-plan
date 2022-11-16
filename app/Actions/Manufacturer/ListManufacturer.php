<?php

namespace App\Actions\Manufacturer;

use App\Models\Manufacturer;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\QueryBuilder\QueryBuilder;

class ListManufacturer
{
    use AsAction;

    public function handle()
    {
        return QueryBuilder::for(Manufacturer::class)->get();
    }
}
