<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api_token',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'user_group');
    }

    public function roles(): array
    {
        $roles = [];
        $query = "SELECT r.name  FROM roles r
        JOIN group_roles gr ON gr.role_id = r.id
        JOIN groups g ON g.id = gr.group_id
        JOIN user_group ug ON ug.group_id = g.id
        JOIN users u ON u.id = ug.user_id
        WHERE u.id={$this->id}";

        $res = DB::select(DB::raw($query));
        if (count($res) > 0) {
            foreach ($res as $item) {
                $roles[] = $item->name;
            }
        }
        return $roles;
    }
}
