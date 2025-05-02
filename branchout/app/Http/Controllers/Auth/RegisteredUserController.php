<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            'company_email' => ['nullable', 'email'],
        'company_phone' => ['nullable', 'string'],
        'about' => ['nullable', 'string'],
        'description' => ['nullable', 'string'],
        ]);

        $isCompany = $request->filled('company_email') ||
        $request->filled('company_phone') ||
        $request->filled('about') ||
        $request->filled('description');

$role = $isCompany ? 'c' : 'u';

        $user = User::create([
            'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $role,
        'company_email' => $request->company_email,
        'company_phone' => $request->company_phone,
        'about' => $request->about,
        'description' => $request->description,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
