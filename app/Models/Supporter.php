<?php

namespace App\Models;

use App\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supporter extends Model
{
    use HasFactory, ClearsResponseCache;

    protected $guarded = [];

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(Responsible::class);
    }
}
