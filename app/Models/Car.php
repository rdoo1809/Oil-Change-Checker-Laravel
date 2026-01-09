<?php

namespace App\Models;

use App\BelongsToUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory, BelongsToUser;

    protected $fillable = [
      'make', 'model', 'year'
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
