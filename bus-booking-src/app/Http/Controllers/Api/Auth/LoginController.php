<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
    	$credentials = $request->validated();

        if (!auth()->attempt($credentials))
            return errorMessage('Unauthenticated', 401);

        auth()->user()->tokens()->delete();

        $authToken = auth()->user()->createToken('auth-token');

    	return new LoginResource(auth()->user(), $authToken);
    }
}