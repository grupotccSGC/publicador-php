<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contato;
use App\Mail\EmailAdmin;
use App\Models\ContatoAdmin;
use Illuminate\Http\Request;
use App\Utilitarios\Paginacao;
use App\Service\ContatoAdminService;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContatoAdminRequest;

class FaleConoscoController extends Controller
{
    public function faleConosco(Request $request){
        return view('fale-conosco');
    }

    public function AdminContatoCliente(Request $request){
        $contato = Contato::find($request->id);
        return view('admin-enviar-email', compact('contato'));
    }

    public function tableContato(Request $request){
        $pagi = new Paginacao();
        $pagi->rows =  Contato::search()->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = Contato::search()->count();
        $pagi->totalNotFiltered = $pagi->total;
        return response()->json($pagi);
    }

    public function enviarEmail(ContatoAdminRequest $request)
    {
        $validated = $request->validated();
        $contatoAdminService =  new ContatoAdminService();
        $contatoAdmin = $contatoAdminService->enviarEmail($request);
        $contato = ContatoAdmin::findOrFail(1);
        Mail::to($request->email)->send(new EmailAdmin($contato));
        $request->session()->flash('sucesso', 'E-mail enviado com sucesso!');
        return redirect()->route('/fale-conosco'); 
    }
}
