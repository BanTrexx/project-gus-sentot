<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coordinator extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function supporters(): HasMany
    {
        return $this->hasMany(Supporter::class);
    }
}
