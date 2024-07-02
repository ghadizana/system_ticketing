<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

use function Laravel\Prompts\password;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function actionLogin(Request $request) {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            Log::info('User logged in: '. Auth::user()->email);
            return redirect()->route('masterUser');
        } else {
            Log::warning('Failed login attempt: ', ['email' => $credentials['email']]);
            return redirect()->route('login')->with('error', 'Email atau password salah.');
        }
    }
}
