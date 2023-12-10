<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Village extends Model
{
    use HasFactory, ClearsResponseCache;

    protected $guarded = ['id'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function coordinators(): HasMany
    {
        return $this->hasMany(Coordinator::class);
    }
}
