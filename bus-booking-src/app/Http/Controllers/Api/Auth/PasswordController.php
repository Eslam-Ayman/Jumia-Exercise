<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VerificationCode;

class PasswordController extends Controller
{
    public function sendVerificationCode(Request $request)
    {
    	$request->validate([
    		'email' => 'required|string|email|max:255|exists:users,email'
        ]);

        $verificationCode = generateVerificationCode();

        try {
        	// Cache::flush();
        	// 300 = 5 minutes = now()->addMinutes(5)
        	$user = Cache::remember($verificationCode, 300, function () { 
			    return User::where('email', request()->email)->first();
			});

            Notification::send($user, new VerificationCode($verificationCode));

        } catch (\Exception $e) {
        	throw $e;
        }

        return successMessage('Check Your email!', 200);
    }

    public function resetPassword(Request $request)
    {
    	$request->validate([
    		'verification_code' => 'required|numeric|min:0|digits:4',
    		'password' => 'required|string|min:8|confirmed'
        ]);

    	if ( ! $user = Cache::pull($request->verification_code) )
    		return entityNotFound();

    	$user->update(['password' => $request->password]);

    	return successMessage('Password Updated Successfully!', 200);
    }

    public function changePassword(Request $request)
    {
    	$request->validate([
    		'current_password' => 'required|string|min:8|password',
    		'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update(['password' => \Hash::make($request->password)]);

    	return successMessage('Password Updated Successfully!', 200);
    }
}