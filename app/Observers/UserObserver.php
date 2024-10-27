<?php

namespace App\Observers;

use App\Models\Profile;
use App\Models\User;

class UserObserver
{
    public function created(User $user){
        Profile::create([
            'user_id'=>$user->id,
        ]);
    }
}
