<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    protected $fillable = [
        'state_id',
        'name',
    ];

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'university_id', 'id');
    }
}
