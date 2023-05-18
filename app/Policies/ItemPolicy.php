<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ItemPolicy
{
    public function manage(User $user)
    {
        return $user->hasAnyRole(['admin', 'superadmin']);
    }
}
