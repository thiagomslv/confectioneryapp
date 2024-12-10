<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Branch;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'amount',
        'branch_id'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
