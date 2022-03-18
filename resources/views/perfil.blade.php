@include('layouts/header')
<body>
    @include('layouts/sidebar')

    <section class="home-section pt-3 pb-5">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Dashboard</span>
        </div>
        <div class="home-content pl-5 d-block pr-5 w-100">
            <h3 class="text mt-5">Meu Perfil</h3>
            @if (session('sucesso'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <form action="/updateUsuario" method="POST" class="mt-4 mb-3 d-flex" enctype="multipart/form-data">
              @csrf
              {{ csrf_field() }}
                  <div class="col col-img-style" style="margin-right: 61px;">
                    <img src="{{ asset(Auth::user()->avatar) }}" width="150" height="150" alt="{{Auth::user()->nome}}" class="rounded-circle">
                  </div>
                <div class="row">
                  <div class="col-10 mb-2">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{Auth::user()->nome}}">
                  </div>
                  <div class="col-5 mb-2">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                  </div>
                  <div class="col-5 mb-2">
                    <label for="permissão">Permissão</label>
                    <select class="form-control" name="permissão" id="permissao" disabled>
                      <option value="{{Auth::user()->nivel_acesso}}">{{Auth::user()->nivel_acesso}}</option>
                    </select>
                  </div>
                  <div class="col-10 mb-2">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                  </div>
                  <div class="col-5 mb-2">
                    <button type="submit" class="btn btn-style ml-0">atualizar</button>
                    <button type="button" class="btn btn-style ml-0" data-toggle="modal" data-target="#staticBackdrop">alterar senha</button>
                  </div>
                </div>
            </form>
        </div>
    </section>

    @include('layouts/modalAlterarSenha')
    

    @include('layouts/script')
    
</body>
</html>