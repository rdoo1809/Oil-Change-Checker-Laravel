<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait BelongsToUser
{
    protected static function bootBelongsToUser()
    {
        static::creating(function (Model $model) {
            if (Auth::check() && empty($model->user_id)) {
                $model->user_id = Auth::id();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
