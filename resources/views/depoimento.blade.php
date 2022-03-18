@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Depoimentos</h3>
        @if (session('sucesso'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <form action="/tableHistorias" method="POST" class="mt-4 mb-3">
            <div class="row">
              <div class="col">
                <label for="nome">Nome</label>
                <input type="text" class="form-control filtro" name="nome" id="nome">
              </div>
              <div class="col">
                <label for="email">E-mail</label>
                <input type="text" class="form-control filtro" name="email" id="email">
              </div>
              <div class="col">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control filtro telefone" name="telefone" id="telefone">
              </div>
              <div class="col">
                <label for="status">Status</label>
                <select class="form-control filtro" name="status" id="status">
                  <option value="" selected>Selecione...</option>
                  <option value="EM AVALIAÇÃO">EM AVALIAÇÃO</option>
                  <option value="APROVADO">APROVADO</option>
                  <option value="NÃO APROVADO">NÃO APROVADO</option>
                </select>
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
        data-url="/tableHistorias">
        <thead>
          <tr>
            <th data-field="nome" data-formatter="AvatarFormatter" data-cell-style="cellStyle">Nome</th>
            <th data-field="email">E-mail</th>
            <th data-field="telefone">Telefone</th>
            <th data-field="depoimento">Depoimento</th>
            <th data-field="status" data-formatter="statusFormatter">Status</th>
            <th data-field="data_cadastro">Data cadastro</th>
            <th data-formatter="AçãoFormatter">Ação</th>
          </tr>
        </thead>
        </table>
    </div>
</section>

   
@include('layouts/script')

<script>

    $('.telefone').mask('(00) 00000-0000');

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


    function AvatarFormatter(value, row, index){
        return [
        `<li><img src="${row.foto}" alt="${value}" class="rounded mr-2 img-style" width="40px" heigth="40px"></li>` +
        `<li class="pt-2 pb-2">${value}</li>`
        ].join('');
    }

    function AçãoFormatter(value, row, index){
        if (row.status == "EM AVALIAÇÃO") {
            return `<a href="/editarDepoimento/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black">editar</a>`;
        }
    }

    function statusFormatter(value, row, index){
      if (value == "EM AVALIAÇÃO") {
        return [`<span class="status status-avaliação">${value}</span>`].join('');
      } else if (value == "APROVADO") {
        return [`<span class="status status-aprovado">${value}</span>`].join('');
      } else {
        return [`<span class="status status-reprovado">${value}</span>`].join('');
      }
    }

    function cellStyle(value, row, index) {
    var classes = [
      'd-flex'
    ]

    if (index % 2 === 0 && index / 2 < classes.length) {
      return {
        classes: classes[index / 2]
      }
    }
    return {
      css: {
        display: 'flex'
      }
    }
  }

</script>

</body>
</html>