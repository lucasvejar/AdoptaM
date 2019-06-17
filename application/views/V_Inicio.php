<div class="container mb-5">
    <div class="card-deck">
    <?php if($animales): ?>
    <?php foreach ($animales as $animal): ?>
    <form class="form-inline" method='post' action='<?= base_url('C_Inicio/adoptar') ?>'> 
    <div class="col-md-6">
        <div class="card carta bg-warning mx-5 mt-5 mb-5 text-white text-center shadow-lg" style="width: 18rem;" >
            <div class="card-body">
            <img class="img-fluid imagenAnimal" src="/AdoptaM/assets/img/animales/<?= $animal->path_imagen //path ?>" alt="Imagen de <?= $animal->nombre_animal //nombre ?>">
            <!-- http://192.168.1.41/rescatistaAnimales/uploads/ -->
                <h4 class="card-title mt-2 tituloLogin"><i class="fas fa-paw"></i><b> <?= $animal->nombre_animal //nombre ?></b></h4>
                <p class="card-text"><i class="fas fa-calendar"></i> Edad: <?= $animal->edad //fechaNacimiento ?><br>
                <i class="fas fa-bone"></i> Raza: <?= $animal->raza_animal //raza ?><br>
                <i class="fas fa-<?= ($animal->sexo_animal /* sexo */ =="Macho") ? "mars" : "venus" ?>"></i> Sexo: <?= $animal->sexo_animal //sexo ?></p>
            </div>
            <input class="form-control" type='hidden' id='idAnimal' name='idAnimal' value="<?= $animal->id_animal ?>">
            <div class="text-center mb-1"><button type="submit" class="btn btn-dark btn-sm btnAdoptar">Adoptar</button></div>
        </div>
    </div>
    </form>
    <?php endforeach ?>
    <?php else: ?>
        <p>No hay datos disponibles</p>
    <?php endif ?>
    </div>
</div>
