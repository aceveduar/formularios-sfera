<?php
    //Incluimos conexión
    include 'conexion.php';

    if(isset($_POST['crearRegistro'])){
        $fecha_crea = mysqli_real_escape_string($con, $_POST['fecha_crea']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $departamento = mysqli_real_escape_string($con, $_POST['departamento']);
        $dia = mysqli_real_escape_string($con, $_POST['dia']);
        $desde = mysqli_real_escape_string($con, $_POST['desde']);
        $hasta = mysqli_real_escape_string($con, $_POST['hasta']);
        $viaticos = mysqli_real_escape_string($con, $_POST['viaticos']);
        $cantidad = mysqli_real_escape_string($con, $_POST['cantidad']);
        $motivo = mysqli_real_escape_string($con, $_POST['motivo']);
        $solicita = mysqli_real_escape_string($con, $_POST['solicita']);
        $autoriza = mysqli_real_escape_string($con, $_POST['autoriza']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('america/mexico_city');
        $time = date('h:i:s a', time());

        //Validar si no están vacíos
        if(!isset($fecha_crea) || $fecha_crea == '' || !isset($nombre) || $nombre == '' || !isset($departamento) || $departamento == '' || !isset($dia) || $dia == '' || $desde == '' || !isset($hasta) || $hasta == ''      || !isset($viaticos) || $viaticos == ''|| !isset($cantidad) || $cantidad == ''|| !isset($motivo) || $motivo == ''|| !isset($solicita) || $solicita == ''|| !isset($autoriza) || $autoriza == ''){
            $error = "Algunos campos están vacíos";
        }else{
            $query = "INSERT INTO permiso_de_salida(fecha_crea, nombre, departamento, dia, desde, hasta, viaticos, cantidad, motivo, solicita, autoriza)
                        VALUES('$fecha_crea','$nombre','$departamento', '$dia','$desde','$hasta', '$viaticos', '$cantidad', '$motivo', '$solicita', '$autoriza')";

            if(!mysqli_query($con, $query)){
                die('Error: ' . mysqli_error($con));
                $error = "Error, no se pudo crear el registro";
            }else{
                $mensaje = "Formato guardado correctamente";
                header('Location: index.php?mensaje='.urlencode($mensaje));
                exit();
            }
        }

    }
    

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Calendario de rangos -->
    <script type="text/javascript" src="js\daterange.js"></script> <!-- Traducimos el calendrio -->

    <title>Permiso de Salida En horario Laboral</title>
  </head>
  <body>
    <div class="container">
        <div class="row caja justify-content-center">

            <?php if(isset($error)) : ?>
                <h4 class="bg-danger text-white"><?php echo $error; ?></h4>
            <?php endif; ?>

            
            <div class="col-sm-7">
                <!-- Nav -->
                <nav class="navbar navbar-light bg-white justify-content-between">
                    <a class="btn btn-outline-primary" href="http://sfera.mx/permisos-2021" role="button">Inicio</a>
                    <form class="form-inline">
                            <img src="img/logo_SFERA.png" width="95" alt="Logo Sfera">
                    </form>
                </nav>
                
                <h4 class="font-weight-normal pt-2">Permiso de Salida En horario Laboral</h4>
                <hr class="bg-primary">
                
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>"> 
                    
                    <!-- Fecha -->
                    <div class="mb-3">
                        <label for="fecha_crea" class="form-label">Fecha:</label>
                        <input type="timestamp" name="fecha_crea" class="form-control" readonly value="<?php echo date("d/m/Y H:i:s");?>"><!-- Podemos usar readonly o disabled -->  <!-- "Y/m/d" -->
                    </div>
                    
                    <!-- Nombre Completo -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label" method="POST" action="">Nombre completo:</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre" placeholder="Fernando Pérez Corona" required onkeyup="PasarValor();">                    
                    </div>

                    <!-- Departamento -->
                    <div class="mb-3">
                        <label for="departamento" class="form-label">Departamento:</label>
                        <select name="departamento" class="form-control">
                            <option value="Field / Operaciones">Field / Operaciones</option>
                            <option value="Comercial / Ventas">Comercial / Ventas</option>
                            <option value="Diseño / Redacción">Diseño / Redacción</option>
                            <option value="TI / Digital">TI / Digital</option>
                            <option value="Administración / Serv. Generales">Administración / Serv. Generales</option>
                        </select>                   
                    </div>

                    <div class="mb-3">
                        <label for="fecha_permiso" class="form-label">Por la presente solicito a usted permiso para ausentarme el día :</label>
                        <input type="date" class="form-control" name="dia" placeholder="Ingresa la fecha">                    
                    </div>
                   
                    
                    <label for="fecha_permiso" class="form-label">En el siguiente horario laboral:</label>                   
                    

                    <div class="row mb-3">
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">Desde</label></div>   
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">Hasta</label></div>   
                        <div class="col-6 themed-grid-col"><input type="time" name="desde" value="08:00:00" class="form-control"></div>
                        <div class="col-6 themed-grid-col"><input type="time" name="hasta" value="18:00:00" class="form-control"></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">Viaticos</label></div>   
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">Cantidad ($MXN)</label></div>
                        <div class="col-6 themed-grid-col">
                        <select name="viaticos" class="form-control">
                            <option value="Taxi / Uber">Taxi / Uber</option>
                            <option value="Gasolina">Gasolina</option>
                        </select>  
                        </div>
                        <div class="col-6 themed-grid-col"><input type="number" name="cantidad" value="0" min="0" max="10000" class="form-control"></div>
                    </div>

                    <div class="row mb-3">
                    <div class="mb-3">
                        <label for="retardo" class="form-label">Destino / Motivo :</label>
                        <textarea name="motivo" rows="1"  class="form-control" required placeholder="Destino / Motivo"></textarea>
                    </div>
                    </div>

                    <br/>

                    <!-- Quién solicita y quién autoriza -->
                    <div class="row mb-3">
                        <div class="col-6 themed-grid-col"><input type="text" name="solicita" required class="form-control" id="nombre2" placeholder="Nombre Completo y Firma" required></div>
                        <div class="col-6 themed-grid-col"><input type="text" name="autoriza" required class="form-control" placeholder="Nombre Completo y Firma" required></div>
                        <div class="col-6 themed-grid-col"><label for="solicita" class="form-label">Solícita:</label></div>
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">Autoriza:</label></div>                      
                    </div>
                    
                    <!-- <button type="submit" class="btn btn-primary w-100" name="crearRegistro"  >Crear Registro</button> -->
                    <input type="submit" class="btn btn-primary w-100" name="crearRegistro" value="Guardar" onclick="window.print();">
                </form>
            </div>
        </div>
    </div>
  </body>
</html>