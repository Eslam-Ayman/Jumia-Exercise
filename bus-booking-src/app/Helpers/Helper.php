<?php 


use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;


/**
 * Create new anonymous resource collection.
 *
 * @return \Illuminate\Http\Resources\Json
 */

function entityNotFound()
{
    return response([
        'status'=>'error',
        'message'=>'Entity Not Found'
    ], 404);
}

/**
 * Create new anonymous resource collection.
 *
 * @param  string  $message
 * @param  string  $code
 * @return \Illuminate\Http\Resources\Json
 */

function errorMessage($message, $statusCode)
{
    return response([
        'status' => 'error',
        'message' => $message
	],
    $statusCode);
}

function successMessage($message, $statusCode)
{
    return response([
        'status' => 'sucess',
        'message' => $message
	],
    $statusCode);
}

function generateVerificationCode($digits = 4)
{
    return '1234'; // just for testing purpose
    
    // $verificationCode = rand(0000, 9999);

    do{
        $verificationCode = rand(pow(10, $digits-1), pow(10, $digits)-1);

    }while ( Cache::has($verificationCode) );

    return $verificationCode;
}