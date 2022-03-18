<?php

namespace App\Service;
use App\Models\ContatoAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ContatoAdminRequest;

class ContatoAdminService{

    public function enviarEmail(ContatoAdminRequest $request){
        
        $contato = new ContatoAdmin();
        $contato->email = $request->email;
        $contato->assunto = $request->assunto;
        $contato->menssagem = $request->menssagem;
        $contato->fk_usuario = Auth::user()->id;
        $contato->save();
    }


}