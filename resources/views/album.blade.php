@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Albums</h3>
        @if (session('sucesso'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <form action="/" method="POST" class="mt-4 mb-3">
            <div class="row">
              <div class="col-6">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control filtro" name="titulo" id="titulo">
              </div>
              <div class="col-6">
                <label for="autor">Autor</label>
                <input type="text" class="form-control filtro" name="autor" id="autor">
              </div>
              <div class="col-6 mt-2">
                <label for="data">Data cadastro</label>
                <input type="text" class="form-control filtro" placeholder="00/00/0000" name="data_cadastro" id="data_cadastro">
              </div>
              <div class="col pt-4">
                <a href="/cadastrar-album" class="btn btn-style mt-3 w-50">Novo album</a>
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
        data-page-list="[15, 25, 50, 100, all]"
        data-side-pagination="server"
        data-sort-name="data_cadastro"
        data-sort-order="desc"
        data-total-not-filtered-field="totalNotFiltered"
        data-page-size="15"
        data-query-params="queryParams"
        data-url="/album/tableAlbum">
        <thead>
          <tr>
            <th data-field="titulo">Titulo</th>
            <th data-field="descricao">Descrição</th>
            <th data-field="quantidades_imagem">Qtd de imagens</th>
            <th data-field="autor">Autor</th>
            <th data-field="data_cadastrado">Data de cadastro</th>
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
            `<a href="/album/editar/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black mr-1">editar</a>` +
            `<a href="/album/remover/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black">remover</a>`
        ].join('');
    }

    $('#data_cadastro').datepicker({
    format: 'dd/mm/yyyy',
    language: 'pt-BR',
    autoclose: true
  });


</script>

</body>
</html>
