<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\Resource;

class LoginResource extends JsonResource
{

    /**
     * @var
     */
    private $authToken;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $authToken)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->resource = $resource;
        $this->authToken = $authToken;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $authToken = $this->authToken;

        return [            
            'user'=>[
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'email_verified_at' => $this->email_verified_at,
            ],
            
            'auth_token' => [
                'token_type' => 'Bearer',
                // 'expires_at' => Carbon::Parse($authToken->token->expires_at)->toDateTimeString(),
                'access_token' => $authToken->plainTextToken,
            ]
        ];
    }
}