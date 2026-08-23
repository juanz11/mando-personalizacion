<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin.orders.index'));
            }

            if (session()->has('cart')) {
                return redirect()->intended(route('checkout.index'));
            }

            return redirect()->intended(route('orders.index'));
        }

        return back()->withErrors(['email' => 'Las credenciales no son correctas.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'country' => ['required', 'in:VE,US'],
            'phone' => ['required', 'string', 'max:50'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $digits = preg_replace('/\D/', '', $data['phone']);
        $digits = ltrim($digits, '0');

        if ($data['country'] === 'VE' && !str_starts_with($digits, '58')) {
            $digits = '58' . $digits;
        } elseif ($data['country'] === 'US' && strlen($digits) === 10) {
            $digits = '1' . $digits;
        }

        $formattedPhone = '+' . $digits;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $formattedPhone,
            'password' => Hash::make($data['password']),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
