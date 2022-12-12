<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('GET')) {
            return view('admin.auth.login');
        }

        if ($request->isMethod('POST')) {
            $request->validate([
                'username' => ['required', 'max:100'],
                'password' => ['required', 'max:20'],
            ]);
            $user = User::where([
                'role_id' => config('constant.ADMIN_ROLE_ID'),
                'username' => $request['username'],
            ])->first();
            if ($user && Hash::check($request['password'], $user->password)) {
                Session::regenerate();
                Auth::guard('web')->login($user);
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('login')
                    ->with('error', 'Email-Address And Password Are Wrong.');
            }
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('web')->logout();
        Session::invalidate();
        Session::regenerateToken();
        return redirect()->route('login');
    }
}
