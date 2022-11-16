<?php

namespace App\Actions\HomeAppliance;

use App\Models\HomeAppliance;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateHomeAppliance
{
    use AsAction;

    public function handle(array $data): HomeAppliance
    {
        $homeAppliance = HomeAppliance::create($data);
        return $homeAppliance->refresh();
    }
}
