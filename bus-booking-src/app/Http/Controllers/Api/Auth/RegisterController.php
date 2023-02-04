<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\RegisterResource;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = $request->validated();

        $verificationCode = generateVerificationCode();

        try {
            $user = Cache::remember($verificationCode, 300, function () use ($user) { 
                return $user;
            });

            /*
                Here i should send notification or email containing the verifivcation code
                but because we don't have a service to integrate with so I will log it and make this code will be static for all user (1234) just for testing purpose
            */
            \Log::info([
                'email' => $user['email'], 
                'name' => $user['name'],
                'subject' => 'Verification Code',
                'body' => 'this is verification code ' . $verificationCode . ' will expire in 5 minutes',
            ]);

        } catch (\Exception $e) {
            throw $e;
        }

        return successMessage('Check Your email!', 200);
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|numeric|min:0|digits:4',
        ]);

        if ( ! $user = Cache::pull($request->verification_code) )
            return entityNotFound();

        $user = User::create($user + ['email_verified_at' => date('Y-m-d H:i:s')])
                        ->assignRole('trial-user');

        $authToken = $user->createToken('auth-token'); // $user->api_token;

        // RegisterResource::withoutWrapping();
        return new RegisterResource($user, $authToken);
    }
}