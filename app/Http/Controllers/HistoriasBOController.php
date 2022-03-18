<?php

namespace App\Http\Controllers;

use App\Models\Historias;
use Illuminate\Http\Request;
use App\Utilitarios\Paginacao;

class HistoriasBOController extends Controller
{
    public function depoimento(Request $request){
        return view('depoimento');
    }

    public function tableHistorias(Request $request){
        $pagi = new Paginacao();
        $pagi->rows =  Historias::search()->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = Historias::search()->count();
        $pagi->totalNotFiltered = $pagi->total;
        return response()->json($pagi);
    }

    public function editarDepoimento(Request $request){
        $depoimento = Historias::find($request->id);
        return view('editarDepoimento', compact('depoimento'));
    }

    public function update(Request $request){
        $update = Historias::find($request->id);
        $update->status = $request->status;
        $update->save();
        $request->session()->flash('sucesso', 'Depoimento atualizado com sucesso!');
        return redirect()->route('/depoimento');
    }

}
