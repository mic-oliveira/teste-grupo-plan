<?php

namespace App\Http\Controllers;

use App\Actions\HomeAppliance\CreateHomeAppliance;
use App\Actions\HomeAppliance\DeleteHomeAppliance;
use App\Actions\HomeAppliance\ListHomeAppliance;
use App\Actions\HomeAppliance\UpdateHomeAppliance;
use App\Http\Requests\StoreHomeApplianceRequest;
use App\Http\Requests\UpdateHomeApplianceRequest;
use App\Http\Resources\HomeApplianceResource;
use App\Models\HomeAppliance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class HomeApplianceController extends Controller
{

    public function index(): AnonymousResourceCollection
    {
        return HomeApplianceResource::collection(ListHomeAppliance::run());
    }


    public function store(StoreHomeApplianceRequest $request): HomeApplianceResource
    {
        return HomeApplianceResource::make(CreateHomeAppliance::run($request->validated()));
    }

    public function show(HomeAppliance $home_appliance): HomeApplianceResource
    {
        return HomeApplianceResource::make($home_appliance);
    }

    public function update(UpdateHomeApplianceRequest $request, HomeAppliance $home_appliance): HomeApplianceResource
    {
        return HomeApplianceResource::make(UpdateHomeAppliance::run($request->validated(), $home_appliance));
    }


    public function destroy(HomeAppliance $home_appliance): HomeApplianceResource
    {
        return HomeApplianceResource::make(DeleteHomeAppliance::run($home_appliance));
    }
}
