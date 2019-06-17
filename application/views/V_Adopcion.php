<!-- Modal que muestra adopcion correcta -->
<div class="modal fade" id="modalAdopcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloModal"><i class="fas fa-check" ></i> Adopción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label> Adoptante: <?= $usuario->nombre_usuario." ".$usuario->apellido_usuario ?></label>
        <label > Fecha adopción: <?= $adopcion->fecha_adopcion ?></label>
        <label> Estado adopción: <?= ($adopcion->estado == 1) ? 'En espera' : ($adopcion->estado==2) ? 'Aceptada':'Rechazada'  ?></label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
</div>