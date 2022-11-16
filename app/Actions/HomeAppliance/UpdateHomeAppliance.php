<?php

namespace App\Actions\HomeAppliance;

use App\Models\HomeAppliance;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateHomeAppliance
{
    use AsAction;

    public function handle(array $data, HomeAppliance $homeAppliance): HomeAppliance
    {
        $homeAppliance->fill($data)->save();
        return $homeAppliance->refresh();
    }
}
