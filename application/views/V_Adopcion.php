
<div class="container mb-5">
    <div class="card-deck">
    <form class="form-inline"> 
    <div class="col-md-6">
        <div class="card carta bg-warning mx-5 mt-5 mb-5 text-white text-center shadow-lg" style="width: 18rem;" >
            <div class="card-body">
                <h4><i class="fas fa-check-circle" ></i>Adopción</h4>
                <label> Adoptante: <?= $usuario->nombre_usuario." ".$usuario->apellido_usuario ?></label>
                <label > Fecha adopción: <?= $adopcion->fecha_adopcion ?></label>
                <label> Estado adopción: En espera</label>
            </div>
        </div>
      </div>
    </form>
    </div>
</div>
