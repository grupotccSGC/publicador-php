<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class PerfilController extends Controller
{
    public function perfil(){
        return view('perfil');
    }

    public function atualizar(Request $request){
       
       $usuario = User::find(Auth::user()->id);
       $usuario->nome = $request->nome;
       $usuario->email = $request->email;
       if(!empty($request->file('avatar'))){
       $usuario->avatar = $request->file('avatar')->store('public/avatar');
       $usuario->avatar = str_replace("public" , "storage" ,$usuario->avatar);
       
       }
       $usuario->save();
       $request->session()->flash('sucesso', 'Alterações feita com sucesso!');
       return redirect()->route('/perfil'); 

    }
    
    public function atualizarSenha(Request $request){
        $usuario = User::find(Auth::user()->id);
        if(!empty($request->senha)){
        $usuario->password =  Hash::make($request->senha);
        }
        $usuario->save();
        $request->session()->flash('sucesso', 'Senha alterada com sucesso!');
        return redirect()->route('/perfil'); 
     }
     
}
