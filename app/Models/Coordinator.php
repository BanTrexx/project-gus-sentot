<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class Coordinator extends Authenticatable
{
    use HasFactory, HasRoles, HasPermissions;

    protected $guard_name = 'web';

    protected $guarded = [];

    protected $hidden = ['password'];

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function responsibles(): HasMany
    {
        return $this->hasMany(Responsible::class);
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
