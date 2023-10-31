<?php

namespace App\Http\Controllers\HomeCompany;

use App\Http\Resources\HomeCompany\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUserProfileRequest(Request $request,User $user){

        return new UserResource($user);

    }
}
