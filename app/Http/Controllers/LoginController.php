<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Auth\Events\PasswordReset;


class LoginController extends Controller
{

    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */

    public function login()
    {
        return view('index');
    }

    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function requestLogin(LoginRequest $request)
    {
        if(!$request->validated()){
            return redirect()->route('/');
        }

        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->route('/dashboard');
        }
       

        return back()->withErrors([
            'danger' => 'Usuário ou senha inválidos!',
        ]);

         

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('/');
    }

    public function esqueciSenha($token) 
    {
        return view('redefinir-senha', ['token' => $token]);
    }

    public function resetPassword(Request $request) {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);
    
        $user =  User::where('email' , '=' ,$request->email)->first();
        if(empty($user)){
            return back()->withErrors(['email' => "E-mail invalido !"]);
        }
        
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('/')->with('status', "Senha alterada com sucesso!");
                     
                       
    }

}