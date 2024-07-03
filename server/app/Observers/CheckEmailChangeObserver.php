<?php

namespace App\Observers;

use App\Models\User;

class CheckEmailChangeObserver
{
    public function checkEmailChange(User $user)
    {
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->save();

            // Send email notification
            // Mail::to($user->email)->send(new EmailChanged($user));
        }
    }
}
