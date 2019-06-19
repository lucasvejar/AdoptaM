
<div class="container my-3">
	<div class="row">
		<div class="col">
			<div class="card cartaPerfil">
				<div class="card-title">
                    <h3 class="ml-5 mt-3"><i class="fas fa-medkit"></i> Información de las Campañas</h3>
                </div>
                <div class="card-body">
                    <div class="scroll" style="height: auto;">
                    <?php if ($campañas != false): ?>
                    <table class="table table-striped table-dark display" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">Tipo campaña</th>
                                <th scope="col"><i class="fas fa-calendar-plus"></i> Fecha </th>
                                <th scope="col"><i class="fas fa-calendar-minus"></i> Ubicación</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($campañas as $campaña): ?>
                            <tr>
                                
                                <td><?= $campaña->nombreCampana ?></td>
                                <td><?= $campaña->fecha ?></td>
                                <td><?= $campaña->ubicacion ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                        <h4 class="ml-5">No hay datos.</h4>
                    <?php endif ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
.scroll {
  height:150px;
  overflow-y: scroll;
}
</style>

<script>

$(document).ready(function () {
    
    $('#table_id').DataTable({
        select: true,  //-----> hace que las filas sean seleccionables
        paging: true,  //--> habilita el paginado
        "language": {    //-------> en este array se puede perzonalizar el texto que se muestra en cada uno de los botones y labels de la tabla y como se muestran los datos
            "lengthMenu": "Muestra _MENU_ campañas por página",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando página _PAGE_ de _PAGES_ páginas",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrando los _MAX_ registros)",
            "search": "<i class='fas fa-filter'></i> Buscar por tipo: ",
            select: {
                rows: "%d fila seleccionada"
            },
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "previous": "Anterior",
                "next": "Siguiente"
            }
        },
        pagingType: 'full_numbers',   //---> es el tipo de botonsitos del paginado, ej: next,previous,first,last
        lengthChange: true,           //----> le habilita el combo box para que el usuario cambie el numero de paginas que quiere ver
        lengthMenu: [5,10,20],       //--> longitud del menu del paginado
        searching: true,             //---> habilita la busqueda de registros
        "columnDefs": [              //-----> se le cambia propiedades a las columnas, cuales son buscables por filtros, visibles, ordenables
            { "searchable": false, "targets": 0, "orderable": false, "visible": false},   //---> columna del id
            { "searchable": true, "targets": [1,2,3], "orderable": true, "visible": true}       
            ],
        "ordering": true,                     //-->  habilita el ordenamiento de columnas
        "search": {                           // -----> opciones para la busqueda de datos 
            "caseInsensitive": true,        //----> habilita el caseSensitive
            "search": " ",               //---> se le puede asignar un filtro por defecto a la busqueda asi los encuentra y ordena por ese filtro
            "smart": true                    //----->  activa la busqueda smart, no busca el String identico, busca los similares y las ocurrencias
        }
    });


});

</script>