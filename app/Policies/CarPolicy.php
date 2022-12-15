<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return in_array('CarView', $user->roles());
    }

    public function view(User $user): bool
    {
        return in_array('CarView', $user->roles());
    }

    public function create(User $user): bool
    {
        return in_array('CarCreate', $user->roles());
    }

    public function update(User $user): bool
    {
        return in_array('CarUpdate', $user->roles());
    }

    public function delete(User $user): bool
    {
        return in_array('CarDelete', $user->roles());
    }

}
