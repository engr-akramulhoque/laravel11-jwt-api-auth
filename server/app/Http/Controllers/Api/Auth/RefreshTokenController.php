<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GenerateTokenResponseTrait;

class RefreshTokenController extends Controller
{
    use GenerateTokenResponseTrait;
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke()
    {
        return $this->respondWithToken(auth('api')->refresh());
    }
}
