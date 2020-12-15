<!--=====================================
  =          Modal Note Creation         =
  ======================================-->
<!-- The Modal -->
<div class="modal" id="modalCrearNota">

  <div class="modal-dialog">

    <div class="modal-content">
        <form role="form" method="post" action="notas" enctype="multipart/form-data">
          @csrf
          <!-- Modal Header -->
          <div class="modal-header" style="background: #2b3a8c ; color: white">

            <h4 class="modal-title">Crear Nota</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Content -->
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                  </div>
                  <textarea class="form-control" name="newContent" placeholder="Escriba el contenido de la nota"></textarea>
                </div>
                
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-success" name="newNote">Crear Nota</button>
          </div>
      </form>

    </div>
  </div>
</div>
<!--=====================================
  =          Modal Note Edit         =
  ======================================-->
<!-- The Modal -->
<div class="modal" id="modalEditarNota">

  <div class="modal-dialog">
    <div class="modal-content">
        <form role="form" method="post" action="notas/editar" enctype="multipart/form-data">
          @csrf
          <!-- Modal Header -->
          <div class="modal-header" style="background: #2b3a8c ; color: white">

            <h4 class="modal-title">Editar Nota</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>

          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="box-body">
              <!-- Content -->
              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                  </div>
                  <textarea class="form-control" name="newContent" placeholder="Escriba el contenido de la nota" id="editContent"></textarea>
                  <input type="hidden" name="editId" id="editId">
                </div>
                
              </div>
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-success" name="editNote">Guardar Cambios</button>
          </div>
      </form>

    </div>
  </div>
</div>