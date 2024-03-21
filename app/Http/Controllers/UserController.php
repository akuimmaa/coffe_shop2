<?php

namespace App\Http\Controllers;

// use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            switch ($user->level) {
                case '1';
                    return redirect()->intended('/jenis');
                    break;

                case '2';
                    return redirect()->intended('/pelanggan');
                    break;

                case '3';
                    return redirect()->intended('/category');
                    break;
            }
        }
        return view('authlogin.login');
    }
    public function cekLogin(Request $request)
    {
        $credential = $request->only('email', 'password');
        // dd ($credential);
        $request->session()->regenerate();
        if (Auth::attempt($credential)) {
            $user = Auth::user();
            switch ($user->level) {
                case '1':
                    return redirect()->intended('/jenis');
                    break;
                case '2':
                    return redirect()->intended('/pelanggan');
                    break;
                case '3':
                    return redirect()->intended('/category');
                    break;
            }
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'nofound' => 'Email or password is wrong'
        ])->onlyInput('email');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}