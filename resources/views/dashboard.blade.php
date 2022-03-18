@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Seções</h3>
        <table class="table table-striped mt-2"
        id="table"
        data-toggle="table"
        data-locale="pt-BR"
        data-url="">
        <thead>
            <tr>
            <th data-field="url">Midia</th>
            <th data-field="nome">Nome</th>
            <th data-field="tamanho">Tamanho</th>
            <th data-field="dimensao">Dimensão</th>
            <th data-field="url">Url</th>
            <th>Ação</th>
            </tr>
        </thead>
        </table>
        <a href="/seção" class="link_url mt-2">Ver tudo</a>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Matérias</h3>
        <table class="table table-striped mt-2"
        id="table"
        data-toggle="table"
        data-locale="pt-BR"
        data-url="">
        <thead>
            <tr>
            <th data-field="url">Midia</th>
            <th data-field="nome">Nome</th>
            <th data-field="tamanho">Tamanho</th>
            <th data-field="dimensao">Dimensão</th>
            <th data-field="url">Url</th>
            <th>Ação</th>
            </tr>
        </thead>
        </table>
        <a href="/matéria" class="link_url mt-2">Ver tudo</a>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Albums</h3>
        <table class="table table-striped mt-2"
        id="table"
        data-toggle="table"
        data-locale="pt-BR"
        data-url="">
        <thead>
            <tr>
            <th data-field="titulo">Titulo</th>
            <th data-field="descricao">Descrição</th>
            <th>Ação</th>
            </tr>
        </thead>
        </table>
        <a href="/album" class="link_url mt-2">Ver tudo</a>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Midias</h3>
        <table class="table table-striped mt-2"
        id="table"
        data-toggle="table"
        data-locale="pt-BR"
        data-url="">
        <thead>
            <tr>
            <th data-field="url">Midia</th>
            <th data-field="nome">Nome</th>
            <th data-field="tamanho">Tamanho</th>
            <th data-field="dimensao">Dimensão</th>
            <th data-field="url">Url</th>
            <th>Ação</th>
            </tr>
        </thead>
        </table>
        <a href="/midia" class="link_url mt-2">Ver tudo</a>
    </div>
</section>

   
@include('layouts/script')

</body>
</html>