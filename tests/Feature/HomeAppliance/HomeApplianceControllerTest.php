<?php

use App\Models\HomeAppliance;
use App\Models\Manufacturer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function Pest\Laravel\assertDatabaseCount;

uses(TestCase::class, RefreshDatabase::class);

it('has index', function () {
    $response = $this->getJson('/api/home-appliances');
    $response->assertOk();
});

it('should filter list', function () {
    assertDatabaseCount('home_appliances', 4);
    $search = urlencode('Geladeira Frost Free');
    $response = $this->getJson("/api/home-appliances?filter[name]=$search");
    $response->assertOk();
    expect($response->json('data'))->toHaveCount(1);
})->with([
    fn() => Manufacturer::factory()->create()
])->with([
    fn() => HomeAppliance::factory()->state(['name' => 'Geladeira Frost Free'])->create()
])->with([
    fn() => HomeAppliance::factory(3)->create()
]);

it('should create home appliance', function (array $data) {
    $response = $this->postJson('/api/home-appliances', $data);
    $response->assertCreated();
    $result = $response->json('data');
    expect($result['name'])->toBe('Geladeira Teste');
})->with([
    [
        [
            'name' => 'Geladeira Teste',
            'description' => 'Texto teste para a geladeira teste',
            'voltage' => 110,
            'manufacturer_id' => 1,
        ]
    ]
])->with([
    fn() => Manufacturer::factory()->create()
]);

it('should not create home appliance with default data except description', function ($data) {
    $response = $this->postJson('/api/home-appliances', $data);
    $response->assertUnprocessable();
})->with([
    [
        [
            'name' => null,
            'description' => 'Texto teste para a geladeira teste',
            'voltage' => 110,
            'manufacturer_id' => 1,
        ]
    ],
    [
        [
            'name' => 'Geladeira Teste',
            'description' => 'Texto teste para a geladeira teste',
            'voltage' => null,
            'manufacturer_id' => 1,
        ]
    ],
    [
        [
            'name' => null,
            'description' => 'Texto teste para a geladeira teste',
            'voltage' => 110,
            'manufacturer_id' => null,
        ]
    ]
])->with([
    fn() => Manufacturer::factory()->create()
]);

it('should update a home appliance', function ($data, $id) {
    $response = $this->putJson("/api/home-appliances/$id", $data);
    $response->assertOk();
})->with([
    [['name'=> 'Teste Update'], 1],
    [['description'=> 'Teste Update'], 1],
    [['voltage'=> 220], 1],
    [['manufacturer_id'=> 2], 2],
])->with([
    fn() => Manufacturer::factory()->count(2)->create()
])->with([
    fn() => HomeAppliance::factory()->count(5)->create()
]);

it('should not update a home appliance when name is null', function ($data, $id) {
    $response = $this->putJson("/api/home-appliances/$id", $data);
    $response->assertUnprocessable();
})->with([
    [['name'=> null], 1],
    [['name'=> null], 2],
    [['name'=> null], 3],
    [['name'=> null], 4],
])->with([
    fn() => Manufacturer::factory()->count(1)->create()
])->with([
    fn() => HomeAppliance::factory()->count(4)->create()
]);

it('should not update a home appliance when voltage is null', function ($data, $id) {
    $response = $this->putJson("/api/home-appliances/$id", $data);
    $response->assertUnprocessable();
})->with([
    [['voltage'=> null], 1],
    [['voltage'=> null], 2],
    [['voltage'=> null], 3],
    [['voltage'=> null], 4],
])->with([
    fn() => Manufacturer::factory()->count(1)->create()
])->with([
    fn() => HomeAppliance::factory()->count(4)->create()
]);

it('should not update a home appliance when manufacturer id not exists', function ($data, $id) {
    $response = $this->putJson("/api/home-appliances/$id", $data);
    $response->assertUnprocessable();
})->with([
    [['manufacturer_id'=> 2], 1],
    [['manufacturer_id'=> 3], 2],
    [['manufacturer_id'=> 4], 3],
    [['manufacturer_id'=> 5], 4],
])->with([
    fn() => Manufacturer::factory()->count(1)->create()
])->with([
    fn() => HomeAppliance::factory()->count(4)->create()
]);

it('should find a home appliance', function ($data) {
    $response = $this->getJson("/api/home-appliances/$data");
    $response->assertOk();
})->with([
    [1,2,3]
])->with([
    fn() => Manufacturer::factory()->create()
])->with([
    fn() => HomeAppliance::factory()->count(5)->create()
]);

it('should return not found', function ($data) {
    $response = $this->getJson("/api/home-appliances/$data");
    $response->assertNotFound();
})->with([
    [1,2,3]
]);

it('should delete a home appliance', function ($data) {
    $response = $this->deleteJson("/api/home-appliances/$data");
    $response->assertOk();
})->with([
    [1,2,3]
])->with([
    fn() => Manufacturer::factory()->create()
])->with([
    fn() => HomeAppliance::factory()->count(5)->create()
]);

it('should return not found on delete a home appliance', function ($data) {
    $response = $this->deleteJson("/api/home-appliances/$data");
    $response->assertNotFound();
})->with([
    [1,2,3]
]);
