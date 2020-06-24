<!-- Esta es la vista Reporte de registros Externos / 23 de Junio 2020 -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS Y Jqry Data tables CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.dataTables.min.css"/>

	<!-- Se cargan las librerias para Data-tables y exportación PDF -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js" type="text/javascript" ></script>
	<script src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js" type="text/javascript"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js" type="text/javascript"></script> 
	</head>
	<!-- Fin de carga de librerias -->

    
    <title>Reporte GP1 Ext.</title>
</head>
<body>
    
    <!-- <div class="container pt-3"> -->
        <div class="mx-auto" style="width: 75%;">
        <h3>Registros de encuesta COVID-19 Externos (Clientes, Proveedores, Visitantes)</h3>
        <p>Estos datos son actualizados automaticamente. Se muestra el registro más actual primero.</p>
        <a href="report.php" class="btn btn-primary">Ver reporte Trabajadores</a>
        <div class=" mt-4">

        <!-- Prueba de Tabla autogenerada por MYSQL -->
        <table class="table text-left" id="table1">
				<thead class="thead thead-dark">
					<tr>
                        <th>ID</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
						<th>Nombre</th>
						<th>Tipo Externo</th>
                        <th>Depto. Visitado</th>
                        <th hidden>Fiebre</th>
                        <th hidden>Tos</th>
                        <th hidden>Estornudos</th>
                        <th hidden>D. Cabeza</th>
                        <th hidden>Diarrea</th>
                        <th hidden>Vomito</th>
                        <th hidden>Calosfrios</th>
                        <th hidden>D. Abdominal</th>
                        <th hidden>M. General</th>
                        <th hidden>Dif. Respirar</th>
					</tr>
                </thead>

                <tbody class="">
                <?php //Construcción de tabla desde get_allitems - Archivo de funciones devuelve $datos	que pasamos a $resultados
                            foreach ($resultados as $fila) {
                                echo "<tr>";
                                    echo '<td><a href="#">'.$fila['id'].'</a></td>';
                                    /* Clase segun estatus */
                                    if($fila['estatus'] == "NORMAL"){
                                        echo "<td class='btn btn-success btn-sm' style='width: 110px'>".$fila['estatus']."</td>";
                                    }else if($fila['estatus'] == "ENFERMO"){
                                        echo "<td class='btn btn-info btn-sm' style='width: 110px'>".$fila['estatus']."</td>";
                                    }else{
                                        echo "<td class='btn btn-danger btn-sm' style='width: 110px'>".$fila['estatus']."</td>";
                                    }
                                    echo "<td>".$fila['stamp']."</td>";
                                    echo "<td>".$fila['nombre']."</td>";
                                    echo "<td>".$fila['tipo']."</td>";
                                    echo "<td>".$fila['dvisitado']."</td>";
                                    echo "<td hidden>".$fila['fiebre']."</td>";
                                    echo "<td hidden>".$fila['tos']."</td>";
                                    echo "<td hidden>".$fila['estornudos']."</td>";
                                    echo "<td hidden>".$fila['dcabeza']."</td>";
                                    echo "<td hidden>".$fila['diarrea']."</td>";
                                    echo "<td hidden>".$fila['vomito']."</td>";
                                    echo "<td hidden>".$fila['calosfrios']."</td>";
                                    echo "<td hidden>".$fila['dabdominal']."</td>";
                                    echo "<td hidden>".$fila['mgeneral']."</td>";
                                    echo "<td hidden>".$fila['drespirar']."</td>";
                                echo "</tr>";	
                            }//fin del foreach
                ?>	<!-- Fin de la ejecucion en PHP -->
                </tbody>
        </table>
        
        </div>
    </div>
</body>

<!-- Aplicamos el JS de data tables -->
<script type="text/javascript">
			$(document).ready(function() {
			    $('#table1').DataTable( {
			        dom: 'Bfrtip',
                    order: [[ 2, "desc" ]],
                    pageLength : 15,
				    buttons: ['copy', 'csv', 'excel']
	   				} 
			    );
			});

</script>

</html>