<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'namemail' => 'required|string',
            'password' => 'required'
        ]);

        $login = $credentials['namemail'];

        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (!Auth::attempt([$field => $login, 'password' => $credentials['password']])) {
            return back()->withErrors([
                'login' => 'Invalid credentials'
            ]);
        }

        $request->session()->regenerate();

        return redirect('/home');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', Password::defaults()]
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Mail::to($user->email)
            ->send(new RegistrationMail($user->name));

        Auth::login($user);

        return redirect('/home');
    }
}
