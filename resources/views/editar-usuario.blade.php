@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Editar usuário</h3>
        <form action="/editarUsuario" method="POST" class="mt-4 mb-3" enctype="multipart/form-data">
        <input type="hidden" class="form-control" name="id" value="{{$usuario->id}}">
        @csrf
        {{ csrf_field() }}
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$usuario->nome}}">
              </div>
              <div class="col-12 mb-3">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$usuario->email}}">
              </div>
              <div class="col-12 mb-3">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" name="avatar" id="avatar">
              </div>
            </div>
            <button type="submit" class="btn btn-style ml-0">Atualizar</button>
        </form>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>