<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistration;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'role_id' => 3,    // Buyer
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        $notification = Notification::create([
            'title' => 'NewUser',
            'content' => 'New User of name ' . $user->name . ' at ' . $user->created_at . ' has registered.',
            'status' => 'Queue',
            'user_id' => 1,
        ]);
        // Custom for notification in admin dashboard
        event(new UserRegistration($notification));

        Auth::login($user);

        return redirect('/user/');
    }
}
