<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GenerateTokenResponseTrait;
use Illuminate\Http\Request;

class RefreshTokenController extends Controller
{
    use GenerateTokenResponseTrait;
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        return $this->respondWithToken($request->user()->refresh(), $request);
    }
}
