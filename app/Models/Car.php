<?php

namespace App\Models;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
    ];

    public function getRouteKeyName(): string
    {
        return 'code';
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}
