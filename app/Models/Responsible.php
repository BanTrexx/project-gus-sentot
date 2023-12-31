<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responsible extends Model
{
    use HasFactory, ClearsResponseCache;

    protected $guarded = ['id'];

    public function coordinator(): BelongsTo
    {
        return $this->belongsTo(Coordinator::class);
    }

    public function supporters()
    {
        return $this->hasMany(Supporter::class);
    }
}
