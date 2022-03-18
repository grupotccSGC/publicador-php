<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Utilitarios\Paginacao;

class AlbumController extends Controller
{
    public function album(Request $request)
    {
       return view('album');
    }

    public function tableAlbum(Request $request)
    {
        $pagi = new Paginacao();
        $pagi->rows =  Album::where('removido','=',false)->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = Album::where('removido','=',false)->count();
        $pagi->totalNotFiltered = $pagi->total;
        return response()->json($pagi); 
    }

    public function tableRemoverRow(Request $request)
    {
       $album = Album::find($request->id);
       $album->removido = true;
       $album->save();
       $request->session()->flash('success', 'Album removido com sucesso');
       return redirect()->route('/album');
    }

    public function editarAlbum(Request $request)
    {
       $album = Album::find($request->id);
       return view('editar-album', compact('album'));
    }

    public function cadastrarAlbum(){
      return view('');
    }
}
