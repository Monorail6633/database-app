<?php

namespace App\Policies;

use App\Models\SerialNumber;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SerialNumberPolicy
{
    public function manage(User $user)
    {
        return $user->hasRole('superadmin');
    }
}
