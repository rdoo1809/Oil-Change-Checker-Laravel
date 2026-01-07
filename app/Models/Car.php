<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = [
      'make', 'model', 'year', 'user_id'
    ];

    public function vehikl(): HasMany
    {
        return $this->hasMany(Vehikl::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
