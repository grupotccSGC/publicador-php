<?php

namespace App\Http\Controllers;

use App\Models\Midia;
use Illuminate\Http\Request;
use App\Service\MidiaService;
use App\Utilitarios\Paginacao;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Exports\MidiaBOExport;
use Maatwebsite\Excel\Facades\Excel;

class MidiaBOController extends Controller
{
    public function midia(Request $request)
    {
        return view('midia');
    }

    public function dropzoneUpload(Request $request)
    {
        $midiaService = new MidiaService();
        $file = $midiaService->save($request);
    }

    public function tableMidia(Request $request)
    {
        $pagi = new Paginacao();
        $pagi->rows =  Midia::search()->where('removido','=',false)->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = Midia::search()->where('removido','=',false)->count();
        $pagi->totalNotFiltered = $pagi->total;
        return response()->json($pagi);  
    }

    public function tableRemoverRow(Request $request){
        $midia = Midia::find($request->id);
        $midia->removido = true;
        $midia->save();
        $request->session()->flash('sucesso', 'Midia removida com sucesso!');
        return redirect()->route('/midia');

    }

    public function exportar(Request $request)
    {
        return Excel::download(new MidiaBOExport, 'midia_relatorio.xlsx');
    }

    
    
}