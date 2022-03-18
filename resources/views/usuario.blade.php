@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Usuários</h3>
        @if (session('sucesso'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <form action="/tableUsuario" method="POST" class="mt-4 mb-3">
            <div class="row">
              <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control filtro" name="nome" id="nome">
              </div>
              <div class="col">
                <label for="email">E-mail</label>
                <input type="text" class="form-control filtro" name="email" id="email">
              </div>
              <div class="col pt-4">
                <a href="/usuario/cadastrar-usuario" class="btn btn-style">Novo usuario</a>
              </div>
            </div>  
        </form>
        <table class="table table-striped mt-2"
        id="table"
        data-toggle="table"
        data-locale="pt-BR"
        data-show-columns="true"
        data-show-columns-toggle-all="true"
        data-show-refresh="true"
        data-pagination="true"
        data-page-list="[10, 25, 50, 100, all]"
        data-side-pagination="server"
        data-sort-name="data_usuario"
        data-sort-order="desc"
        data-page-size="10"
        data-query-params="queryParams"
        data-url="/tableUsuario">
        <thead>
          <tr>
            <th data-field="nome">Nome</th>
            <th data-field="email">E-mail</th>
            <th data-field="nivel_acesso">Permissão</th>
            <th data-field="avatar" data-formatter="avatarLinkFormatter">Avatar</th>
            <th data-field="data_usuario">Data cadastro</th>
            <th data-formatter="AçãoFormatter">Ação</th>
          </tr>
        </thead>
        </table>
    </div>
</section>
   
@include('layouts/script')

<script>

    var $table = $('#table')
    function queryParams(params) {
        $('.filtro').each(function () {
        if($(this).val() != "")
        params[$(this).attr('name')] = $(this).val()
        })
        return params
    }


    $('.filtro').change(function(){
        $table.bootstrapTable('refresh')
    });

    function AçãoFormatter(value, row, index){
        return [
            `<a href="/usuario/editar/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black mr-1">editar</a>` +
            `<a href="/usuario/remover/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black">remover</a>`
        ].join('');
    }

    function avatarLinkFormatter(value, row, index){
        return [`<a href="${value}" class="link_url">link</a>`].join('');
    }

</script>

</body>
</html>