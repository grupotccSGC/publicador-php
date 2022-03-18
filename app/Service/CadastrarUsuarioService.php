<?php

namespace App\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\NovoUsuarioRequest;

class CadastrarUsuarioService{

    public function cadastrarNovoUsuario(Request $request){

        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->nivel_acesso = $request->nivel;
        $usuario->password =  Hash::make($request->password);
        if(!empty($request->file('avatar'))){
          $usuario->avatar = $request->file('avatar')->store('public');
          $usuario->avatar = str_replace("public" , "storage" ,$usuario->avatar);
            
        }
        $usuario->removido = '0';
        $usuario->save();

        
    }


}