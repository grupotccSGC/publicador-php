<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use Illuminate\Http\Request;
use App\Utilitarios\Paginacao;

class FaleConoscoController extends Controller
{
    public function faleConosco(Request $request){
        return view('fale-conosco');
    }

    public function tableContato(Request $request){
        $pagi = new Paginacao();
        $pagi->rows =  Contato::search()->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = Contato::search()->count();
        $pagi->totalNotFiltered = $pagi->total;
        return response()->json($pagi);
    }
}
