<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UpdateProfileRequest;

class UserAccountController extends Controller
{
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile()
    {
        return response()->json([
            'status' => true,
            'data' => auth('api')->user()
        ], 200);
    }

    public function update(UpdateProfileRequest $request)
    {
        $input = $request->validated();

        if ($request->hasFile('avatar')) {
            $avatarName = time() . '.' . $request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('avatars'), $avatarName);

            $input['avatar'] = $avatarName;
        } else {
            unset($input['avatar']);
        }

        // Check if the email has changed
        if ($request->email !== $request->user('api')->email) {
            $input['email_verified_at'] = null;
        }

        $request->user('api')->update($input);

        return response()->json([
            'status' => true,
            'message' => 'Profile successfully updated'
        ], 200);
    }
}
