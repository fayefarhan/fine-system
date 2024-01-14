<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = null;

    public function showLoginForm()
{
    return view('auth.login', ['url' => url('login')]);
}

public function login(Request $request)
{
    $this->validate($request, [
        'matric_number' => 'required|string',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('matric_number', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed, redirect based on user role
        if (Auth::user()->is_staff) {
            return redirect()->intended('/staff/dashboard');
        } else {
            return redirect()->intended('/student/dashboard');
        }
    }

    return redirect()->back()->withInput($request->only('matric_number', 'remember'))->withErrors([
        'matric_number' => 'Invalid matric number or password.',
    ]);
}

protected function authenticated(Request $request, $user)
{
    $redirectRoute = '/';

    if ($user->role === 'student') {
        $redirectRoute = route('student.dashboard.index');
    } elseif ($user->is_staff) {
        $redirectRoute = '/staff/dashboard';
    }

    return redirect($redirectRoute);
}

}
