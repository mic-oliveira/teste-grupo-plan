<?php

namespace App\Http\Controllers;

use App\Actions\Manufacturer\ListManufacturer;
use App\Http\Resources\ManufacturerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ManufacturerController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ManufacturerResource::collection(ListManufacturer::run());
    }


    public function store(Request $request): void
    {

    }

    public function show($id): void
    {
        //
    }

    public function update(Request $request, $id): void
    {
        //
    }

    public function destroy($id): void
    {
        //
    }
}
