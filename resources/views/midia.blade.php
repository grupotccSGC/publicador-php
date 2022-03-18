@include('layouts/header')
<body>

@include('layouts/sidebar')

<section class="home-section pt-3 pb-5">
    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Dashboard</span>
    </div>
    <div class="home-content pl-5 pr-5 d-block w-100">
        <input type="hidden" name="id">
        <h3 class="text mt-5">Midias</h3>
        <section class="container-fluid ml-0 mr-0 pl-0 pr-0 mb-4">
            <div class="alert alert-danger alert-dismissible fade show d-none" id="alert-image" role="alert"></div>
            <form method="POST" enctype="multipart/form-data" class="dropzone" id="dropzone" action="dropzoneUpload">
              @csrf
              {{ csrf_field() }}
                <div class="dz-default dz-message">
                  <img src="icons/file.png" class="img-upload">
                  <button class="dz-button mt-2" type="button">Arraste seus arquivos para cá!</button>
                </div>
              </form>
        </section>
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
        <div class="col ml-0 pl-0">
          <div class="col-4 mt-3 ml-0 pl-0">
            <a href="/exportar" class="btn btn-azul-escuro w-75 p-2 ml-0">download</a>
          </div>
        </div>
    </div>
</section>

@include('layouts/script')

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

</body>
</html>