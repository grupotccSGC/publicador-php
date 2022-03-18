@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Editar depoimento de {{$depoimento->nome}}</h3>
        <form action="/updateDepoimento" method="POST" class="mt-4 mb-3">
        <input type="hidden" class="form-control" name="id" value="{{$depoimento->id}}">
        @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{$depoimento->nome}}" readonly>
              </div>
              <div class="col-sm-6 mb-3">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$depoimento->email}}" readonly>
              </div>
              <div class="col-sm-6 mb-3">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                  <option value="EM AVALIAÇÃO" {{$depoimento->status  == 'EM AVALIAÇÃO' ? 'selected' : ''}}>EM AVALIAÇÃO</option>
                  <option value="APROVADO" {{$depoimento->status == 'APROVADO' ? 'selected' : ''}}>APROVADO</option>
                  <option value="NÃO APROVADO" {{$depoimento->status  == 'NÃO APROVADO' ? 'selected' : ''}}>NÃO APROVADO</option>
                </select>
              </div>
              <div class="col-12 mb-3">
                <label for="depoimento">Depoimento</label>
                <textarea class="form-control" name="depoimento" id="depoimento" cols="30" rows="10" readonly>{{$depoimento->depoimento}}</textarea>
              </div>  
            </div>
            <button type="submit" class="btn btn-style">Atualizar</button>
        </form>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>