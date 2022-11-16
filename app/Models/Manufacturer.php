<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturers';

    protected $fillable = [
        'name'
    ];

    public function home_appliances(): HasMany
    {
        return $this->hasMany(HomeAppliance::class)->orderBy('id');
    }
}
