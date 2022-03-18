@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Enviar menssagem para: {{$contato->nome}}</h3>
        <form action="/enviarEmail" method="POST" class="mt-4 mb-3">
            <input type="hidden" name="id" value="{{$contato->id}}">
            @csrf
            <div class="row">
              <div class="col-12 mb-3">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" name="email" id="email" value="{{$contato->email}}" readonly>
              </div>
              <div class="col-12 mb-3">
                <label for="assunto">Assunto</label>
                <input type="text" class="form-control  @error('assunto', 'post') is-invalid @enderror" name="assunto" id="assunto" placeholder="Digite seu assunto" value="{{ old('assunto') }}">
                @error('assunto')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-12 mb-3">
                <label for="menssagem">Menssagem</label>
                <textarea class="form-control @error('menssagem', 'post') is-invalid @enderror" name="menssagem" id="menssagem" cols="30" rows="10" placeholder="Digite sua menssagem">{{ old('menssagem') }}</textarea>
                @error('menssagem')
                  <span class="mt-2 mb-2 error">{{$message}}</span>
                @enderror
              </div>
              <div class="col-sm-8 mb-3">
                  <button type="submit" class="btn btn-style">enviar</button>
              </div>
            </div>  
        </form>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>