<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use AuthenticatesUsers;

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('client.index');
    }
}