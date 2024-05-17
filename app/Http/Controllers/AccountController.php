<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; // Importa la clase Route

class AccountController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }


    public function loginPost(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('welcome', absolute: false));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout(); // Utiliza Auth aquí

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
