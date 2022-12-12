<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseController
{
    /**
     * To register api
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20',
        ]);
        try {
            User::create([
                'name' => $request->input('name'),
                'role_id' => config('constant.ADMIN_ROLE_ID'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('name')),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'status' => config('constant.USER_DEFAULT_STATUS'),
            ]);
            return $this->sendResponse(null, 'User Register successfully.');
        } catch (Exception $e) {
            return $this->sendError($e, null, JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * To login api
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'password' => ['required', 'max:20'],
        ]);
        $user = User::where([
            'name' => $request['name'],
        ])->first();
        if ($user && Hash::check($request['password'], $user->password)) {
            Auth::guard('api')->setUser($user);
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], JsonResponse::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * To logout api
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $success = Auth::guard('api')->user()->token()->revoke();
        if ($success) {
            return $this->sendResponse(null, 'User Logout successfully.');
        }
    }
}
