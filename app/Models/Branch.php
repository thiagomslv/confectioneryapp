<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Product;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'location',
    ];

    public function stock(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getLocationAttribute(): mixed
    {
        return self::select(
            Branch::raw("ST_Y(location::geometry) AS lat"),
            Branch::raw("ST_X(location::geometry) AS long")
        )->whereId($this->id)->first();
    }
}
