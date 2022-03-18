<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\File;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Utilitarios\Paginacao;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Service\EditarUsuarioService;
use Illuminate\Support\Facades\Storage;
use App\Service\CadastrarUsuarioService;
use App\Http\Requests\NovoUsuarioRequest;


class UserController extends Controller
{

    private UserService $userService;


    public function __construct(UserService $userService){
            $this->userService = $userService;
    }


    public function usuario(){
        return view('usuario');
    }


    public function tableUsuario(Request $request){
        return $this->userService->tableUsuario($request);
    }

    public function cadastrarUsuario(){
        return view('novo-usuario');
    }

    public function editar(Request $request){
        $usuario = User::find($request->id);
        return view('editar-usuario', compact('usuario'));
    }

    public function cadastrarNovoUsuario(NovoUsuarioRequest $request){

        $validUser = User::where('email', '=', $request->email)->first();

        if ($validUser) {
            $request->session()->flash('error', 'O e-mail informado já está cadastrado no nosso sistema.');
            return redirect('/usuario/cadastrar-usuario');    
        } else {
            $validated = $request->validated();
            $cadastrar = new CadastrarUsuarioService();
            $usuario = $cadastrar->cadastrarNovoUsuario($request);
            $request->session()->flash('sucesso', 'Novo usuário cadastrado com sucesso!');
            return redirect('/usuario/cadastrar-usuario');    
        }
        
    }

    public function tableRemoverRow(Request $request){
        $usuario = User::find($request->id);
        $usuario->removido = true;
        $usuario->save();
        $request->session()->flash('sucesso', 'Usuário removido com sucesso!');
        return redirect()->route('/usuario');

    }

    public function editarUsuario(Request $request){

        $usuario = User::find($request->id);
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        if(!empty($request->file('avatar'))){
        $usuario->avatar = $request->file('avatar')->store('public');
        $usuario->avatar = str_replace("public" , "storage" ,$usuario->avatar);
        
        }
        $usuario->save();
        $request->session()->flash('sucesso', 'Usuário atualizado com sucesso!');
        return redirect()->route('/usuario');
    }

}
