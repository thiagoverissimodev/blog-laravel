<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    
    public function login()
    {
        return view('auth.login');
    }

    
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            Alert::toast('Acesso autorizado!','success');
            return redirect()->intended(route('dashboard.home'));
        }else{
            Alert::toast('Usuário e/ou senha inválido','error');
            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        redirect('/');
    }
    
}
