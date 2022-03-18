<?php

namespace App\Service;


use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Models\User;
use App\Utilitarios\Paginacao;

class UserService{

    public function tableUsuario(Request $request){
        
        //User::limit($request->limit)->offset($request->offset)->get();

        //$paginacao = User::search()->Paginate();
        $pagi = new Paginacao();
        $pagi->rows =  User::search()->where('removido','=',false)->limit($request->limit)->offset($request->offset)->orderBy($request->sort, $request->order)->get();
        $pagi->total = User::search()->where('removido','=',false)->count();
        $pagi->totalNotFiltered = $pagi->total;
        
        //return response()->json();
        return response()->json($pagi);
    }

}