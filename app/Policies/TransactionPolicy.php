<?php

namespace App\Policies;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransactionPolicy
{
    public function manage(User $user)
    {
        return $user->hasRole('superadmin');
    }
}

