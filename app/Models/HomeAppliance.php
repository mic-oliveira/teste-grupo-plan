<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeAppliance extends Model
{
    use HasFactory;

    protected $table = 'home_appliances';

    protected $fillable = [
        'name',
        'description',
        'voltage',
        'manufacturer_id'
    ];

    public function manufacturer(): BelongsTo
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
