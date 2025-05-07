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

    public function create_instractor(): View
    {
        return view('auth.instractor_register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /** -- check the registration path is instractor or student ---- */
        if($request->route()->getName() === 'instractor.register.submit'){
            $role= 2;
        }else{
            $role = 0;
        }

    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=> $role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 0) {
            return redirect()->route('student.dashboard');
        } elseif ($user->role === 1) {
            return redirect()->route('instructor.dashboard'); // pending instructor page
        } elseif ($user->role === 2) {
            return redirect()->route('dashboard'); // approved instructor
        }


        return redirect()->route('index');


    }
}
