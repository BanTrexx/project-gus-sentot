<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Supporter extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function responsible(): BelongsTo
    {
        return $this->belongsTo(Responsible::class);
    }
}
