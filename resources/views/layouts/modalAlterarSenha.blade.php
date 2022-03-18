<!-- Modal alterar senha -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Alteração de senha</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="bi bi-x"></i></span>
          </button>
        </div>
        <form action="/updateSenha" method="POST">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-9 mb-2">
                    <label for="senha">Nova senha</label>
                    <input type="text" class="form-control" name="senha" id="senha" placeholder="Digite sua nova senha">
                    </div>
                </div>    
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-style">alterar</button>
            </div>
        </form>    
      </div>
    </div>
  </div>