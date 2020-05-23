<?php

namespace App\Http\Controllers;

use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;

class AuthUserController extends Controller
{
    public function show() {

        $user = auth()->user();
        return new UserResource($user);
    }
}
