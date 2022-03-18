@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <h3 class="text mt-5">Novo album</h3>
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
                <a href="/album/cadastrar-album" class="btn btn-style mt-3 w-50">Novo album</a>
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
        data-sort-name="data_cadastro"
        data-sort-order="desc"
        data-total-not-filtered-field="totalNotFiltered"
        data-page-size="10"
        data-url="/tableMidia">
        <thead>
            <tr>
            <th data-field="state" data-checkbox="true"></th>
            <th data-field="nome" data-formatter="formatNome" data-cell-style="cellStyle">Nome</th>
            <th data-field="tamanho" data-formatter="formatBytes">Tamanho</th>
            <th data-field="dimensao">Dimensão</th>
            <th data-field="url" data-formatter="avatarLinkFormatter">Url</th>
            <th data-field="autor">Autor</th>
            <th data-field="data_cadastro">Data envio</th>
            <th data-formatter="AçãoFormatter">Ação</th>
            </tr>
        </thead>
        </table>
    </div>
</section>

<script>
    function AçãoFormatter(value, row, index){
       return [
           `<a href="/midia/remover/${row.id}" class="btn bg-white rounded-xl py-2 px-3 text-lg font-semibold tracking-tighter text-black">remover</a>`
       ].join('');
   }

   function avatarLinkFormatter(value, row, index){
       return [`<a href="${value}" class="link_url" target="_blank">link</a>`].join('');
   }

   function formatBytes(value, decimals = 2) {
   if (value === 0) return '0 Bytes';

   const k = 1024;
   const dm = decimals < 0 ? 0 : decimals;
   const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

   const i = Math.floor(Math.log(value) / Math.log(k));

   return parseFloat((value / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}

function formatNome(value, row, index){
     if(row.tipo == "mp3"){
     return [
       `<li><img src="icons/video.png" alt="${value}" class="rounded mr-2 img-style" width="80px" heigth="80px"></li>` +
       `<li class="pt-4 pb-4">${value}</li>`
       ].join('');      
     } else if(row.tipo == "mp4"){
       return [
       `<li><img src="icons/video.png" alt="${value}" class="rounded mr-2 img-style" width="80px" heigth="80px"></li>` +
       `<li class="pt-4 pb-4">${value}</li>`
       ].join('');        
     } else if(row.tipo == "pdf"){
       return [
       `<li><img src="icons/pdf.png" alt="${value}" class="rounded mr-2 img-style" width="80px" heigth="80px"></li>` +
       `<li class="pt-4 pb-4">${value}</li>`
       ].join('');  
     }
     return [
       `<li><img src="${row.url}" alt="${value}" class="rounded mr-2 img-style" width="80px" heigth="80px"></li>` +
       `<li class="pt-4 pb-4">${value}</li>`
       ].join('');
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


@include('layouts/script')

</body>
</html>
