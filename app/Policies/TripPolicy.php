<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TripPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array('TripView', $user->roles());
    }

    public function view(User $user): bool
    {
        return in_array('TripView', $user->roles());
    }

    public function create(User $user): bool
    {
        return in_array('TripCreate', $user->roles());
    }

    public function update(User $user): bool
    {
        return in_array('TripUpdate', $user->roles());
    }

    public function delete(User $user): bool
    {
        return in_array('TripDelete', $user->roles());
    }

}
