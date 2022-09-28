<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait VerifyUser
{
    public function checkStuden()
    {
        if (Auth::user()->user_type == 3) {
            return true;
        }
        return false;
    }
}
