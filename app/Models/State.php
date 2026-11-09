<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $fillable = [
        'name',
    ];

    public function universities(): HasMany
    {
        return $this->hasMany(University::class, 'state_id', 'id');
    }
}
