<?php
/*
 * This observer is created for development and testing purposes (set newly created user as admin)
 */

namespace App\Observers;

use \App\Models\Group;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        $adminGroup = Group::where('name', 'Administrators')->first();
        if ($adminGroup instanceof \App\Models\Group) {
            $user->groups()->attach($adminGroup->id);
        }
    }

}
