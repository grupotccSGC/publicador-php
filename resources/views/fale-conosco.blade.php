@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Fale conosco</h3>
        @if (session('sucesso'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('sucesso') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        @endif
        <form action="/tableContato" method="POST" class="mt-4 mb-3">
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
        data-sort-name="data_de_envio"
        data-sort-order="desc"
        data-total-not-filtered-field="totalNotFiltered"
        data-page-size="10"
        data-query-params="queryParams"
        data-url="/tableContato">
        <thead>
          <tr>
            <th data-field="nome">Nome</th>
            <th data-field="email">E-mail</th>
            <th data-field="ddd">DDD</th>
            <th data-field="telefone">Telefone</th>
            <th data-field="empresa">Empresa</th>
            <th data-field="menssagem" data-cell-style="cellStyleMenssagem">Menssagem</th>
            <th data-field="data_de_envio">Data cadastro</th>
            <th data-formatter="AçãoFormatter">Entrar em contato</th>
          </tr>
        </thead>
        </table>
    </div>
</section>

   
@include('layouts/script')

<script>

    $('.telefone').mask('00000-0000', {reverse: true});

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
            return [
            `<a href="/fale-conosco/enviar-email/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black">enviar</a>`
            ].join('');
    }

    function cellStyleMenssagem(value, row, index){

      var classes = [
        'col-msg'
      ]

      return {
        classes: classes
      }
    }

</script>

</body>
</html>