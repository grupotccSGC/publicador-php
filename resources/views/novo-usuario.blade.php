@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Novo usuário</h3>
        @if (session('sucesso'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <form action="/cadastrarNovoUsuario" method="POST" class="mt-4 mb-3" enctype="multipart/form-data">
        @csrf
        {{ csrf_field() }}
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control @error('nome', 'post') is-invalid @enderror" name="nome" id="nome" value="{{ old('nome') }}">
                @error('nome')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="email">E-mail</label>
                <input type="text" class="form-control @error('email', 'post') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="permissão">Permissão</label>
                <select class="form-control @error('permissão', 'post') is-invalid @enderror" name="nivel" id="nivel">
                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                </select>
                @error('permissão')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="senha">Senha</label>
                <input type="text" class="form-control @error('password', 'post') is-invalid @enderror" name="password" id="password" value="{{ old('password') }}">
                @error('password')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control @error('avatar', 'post') is-invalid @enderror" name="avatar" id="avatar">
                @error('avatar')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-5 mb-3">
                <a href="/usuario" class="btn btn-style ml-0">Voltar</a>
                <button type="submit" class="btn btn-style ml-0">Cadastrar</button>
              </div>
            </div>
        </form>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>