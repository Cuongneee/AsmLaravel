<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $info = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Kiểm tra tồn tại user
        $user = User::query()->where('email', $info['email'])->first();

        $isPasswordCorrect = false;
        if ($user) {
            $isPasswordCorrect = Hash::check($info['password'], $user->password);

            if ($user->active == 0) {

                Auth::logout();
                return redirect()->back()->with('error', 'Tài khoản bị vô hiệu hóa vui lòng thử lại sau❗');
            }
        }
        // Kiểm tra checkbox có đc chọn
        $remember = $request->filled('remember_token');

        if ($user && $isPasswordCorrect) {
            // Regenerate session để ngăn chặn session fixation attacks
            $request->session()->regenerate();

            session()->put('user', $user);
            // dd(vars: session());

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }



}
