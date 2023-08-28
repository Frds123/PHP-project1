<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(user $user)
    {
        if($user->role_id == 1){
            return true;
        }

        return false;
    }
    public function aside_btn(user $user)
    {
        if($user->status == 1){
            return true;
        }

        return false;
    }
    public function aside(user $user)
    {
        if($user->role_id == 1){
            return true;
        }

        return false;
    }
    public function btn(user $user)
    {
        if($user->role_id == 1){
            return true;
        }

        return false;
    }
}