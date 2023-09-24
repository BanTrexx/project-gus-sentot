<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Coordinator extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $guard = 'coordinator';

    protected $guarded = [];

    protected $hidden = ['password'];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function supporters(): HasMany
    {
        return $this->hasMany(Supporter::class);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
