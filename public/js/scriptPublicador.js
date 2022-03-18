document.addEventListener('DOMContentLoaded', () => {
    const darkModeStorage = localStorage.getItem('dark');
    const body = document.querySelector('body');
    const inputDarkMode = document.getElementById('chk');

    if(darkModeStorage){
        body.setAttribute("dark", "true");
		inputDarkMode.checked = "true";
    }

    inputDarkMode.addEventListener('change', () => {
        if(inputDarkMode.checked){
            body.setAttribute("dark", "true");
            localStorage.setItem('dark', true);
        }else{
            body.removeAttribute("dark");
            localStorage.removeItem('dark');
        }
   });
});

Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#dropzone", {
    paramName: "file",
    dictDefaultMessage: "Arraste seus arquivos para cá!",
    dictFileTooBig: "O arquivo é muito grande ({{filesize}}MiB). Tamanho máximo do arquivo: {{maxFilesize}}MiB.",
    dictRemoveFile: "REMOVER",
    maxFilesize: 10590,
    maxFiles: 20,
    autoProcessQueue: true,
    uploadMultiple: true,
    addRemoveLinks: true
});

    myDropzone.on("addedfile", function (data) {

        var ext = data.name.split('.').pop();

        if (ext == "mp3") {
            $(data.previewElement).find(".dz-image img").attr("src", "icons/video.png");
        } else if (ext.indexOf("mp4") != -1) {
            $(data.previewElement).find(".dz-image img").attr("src", "icons/video.png");
        } else if (ext.indexOf("pdf") != -1) {
            $(data.previewElement).find(".dz-image img").attr("src", "icons/pdf.png");
        }

    });

    myDropzone.on("success", function () {
        $('#alert-image').text('Imagem(s) submetida com sucesso, você pode exclui-la ou submeter outra imagem arrastando-a para a área.');
        $('#alert-image').addClass('alert-success');
        $('#alert-image').removeClass('alert-danger');
        $('#alert-image').removeClass('d-none');
    });

    myDropzone.on("error", function () {
        $('#alert-image').text('Houve um problema no upload da sua imagem, por favor tente novamente.');
        $('#alert-image').addClass('alert-danger');
        $('#alert-image').removeClass('alert-success');
        $('#alert-image').removeClass('d-none');
    });

    myDropzone.on("maxFilesize", function(file) {
        var alertaExclusivo = '<div id="alerta-imagem-multiplo" class="alert alert-danger" role="alert"> Você pode dar upload de apenas uma imagem por vêz. </div>';
        if($('#alerta-imagem-multiplo').length < 1){
          $('#dropzone').parent().prepend(alertaExclusivo);
        }
        myDropzone.removeFile(file);
    });

    myDropzone.on("reset", function() {
        $('#alerta-imagem').addClass('d-none');
        $('#alerta-imagem-multiplo').remove();
    });
