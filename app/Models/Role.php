<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class,'group_roles');
    }
}
