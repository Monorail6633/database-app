<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReportsPolicy
{
    public function manage(User $user)
    {
        return $user->hasRole('superadmin');
    }
}
