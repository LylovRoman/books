<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::query()->create([
        'name' => $validated['name'],
        'password' => Hash::make($validated['password']),
        'api_token' => ''
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('books.index'));
        }

        return back()->withErrors([
            'error' => 'Ошибка регистрации.',
        ]);
    }

    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('books.index'));
        }

        return back()->withErrors([
            'error' => 'Неверно указан логин или пароль.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('books.index'));
    }
}
