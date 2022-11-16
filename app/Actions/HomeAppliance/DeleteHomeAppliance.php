<?php

namespace App\Actions\HomeAppliance;

use App\Models\HomeAppliance;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteHomeAppliance
{
    use AsAction;

    public function handle(HomeAppliance $homeAppliance): HomeAppliance
    {
        $homeAppliance->delete();
        return $homeAppliance->refresh();
    }
}
