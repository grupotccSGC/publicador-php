<?php

namespace App\Service;

use App\Models\Midia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MidiaService{
    public function save(Request $request)
    {
        $fileupload = new Midia();
        /* CADASTRAR AS INFORMAÇÕES DA IMAGEM/VIDEO */
        $fileupload->nome = $request->file('file')[0]->getClientOriginalName();
        $fileupload->url = $request->file('file')[0]->storePublicly('public/midia');
        $fileupload->url = str_replace("public/midia" , "storage/midia" ,$fileupload->url);
        $fileupload->tamanho = filesize($fileupload->url);
        if (list($largura, $altura) = getimagesize($fileupload->url)) {
            $fileupload->dimensao = $largura."x".$altura;
        }
        $fileupload->tipo = $request->file('file')[0]->extension();
        $fileupload->removido = false;
        $fileupload->autor = Auth::user()->nome;
        $fileupload->save();
    }
}