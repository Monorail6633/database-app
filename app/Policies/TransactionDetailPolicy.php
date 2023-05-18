<?php

namespace App\Policies;

use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionDetailPolicy
{
    public function manage(User $user)
    {
        return $user->hasRole('superadmin');
    }
}
