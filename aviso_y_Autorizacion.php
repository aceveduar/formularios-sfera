<?php
    //Incluimos conexión
    include 'conexion.php';

    if(isset($_POST['crearRegistro'])){
        $fecha_crea = mysqli_real_escape_string($con, $_POST['fecha_crea']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $departamento = mysqli_real_escape_string($con, $_POST['departamento']);
        $dia_permiso = mysqli_real_escape_string($con, $_POST['dia_permiso']);
        $durante = mysqli_real_escape_string($con, $_POST['durante']);
        $hora1 = mysqli_real_escape_string($con, $_POST['hora1']);
        $hora2 = mysqli_real_escape_string($con, $_POST['hora2']);
        $goc_sueldo = mysqli_real_escape_string($con, $_POST['goc_sueldo']);
        $motivo = mysqli_real_escape_string($con, $_POST['motivo']);
        $solicita = mysqli_real_escape_string($con, $_POST['solicita']);
        $autoriza = mysqli_real_escape_string($con, $_POST['autoriza']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('america/mexico_city');
        $time = date('h:i:s a', time());

        //Validar si no están vacíos
        if(!isset($fecha_crea) || $fecha_crea == '' || !isset($nombre) || $nombre == '' || !isset($departamento) || $departamento == '' || !isset($dia_permiso) || $dia_permiso == '' || !isset($durante) || $durante == '' || !isset($hora1) || $hora1 == '' || !isset($hora2) || $hora2 == '' || !isset($goc_sueldo) || $goc_sueldo == '' || !isset($motivo) || $motivo == '' || !isset($solicita) || $solicita == '' || !isset($autoriza) || $autoriza == ''){
            $error = "Algunos campos están vacíos";
        }else{
            $query = "INSERT INTO aviso_y_autorizacion(fecha_crea, nombre, departamento, dia_permiso, durante, hora1, hora2, goc_sueldo, motivo, solicita, autoriza)
                        VALUES('$fecha_crea', '$nombre', '$departamento','$dia_permiso', '$durante', '$hora1','$hora2', '$goc_sueldo', '$motivo', '$solicita', '$autoriza')";

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
    <script type="text/javascript" src="js\daterange.js"></script> <!-- Traducimos el calendrio --> 

    <title>Aviso y Autorización de Retardo o Salida Antes de Hora</title>
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
                
                <h4 class="font-weight-normal pt-2">Aviso y Autorización de Retardo o Salida Antes de Hora</h4>
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

                    <!-- Día en que se ausenta -->
                    <div class="mb-3">
                        <label for="dia_permiso" class="form-label">Por la presente solicito a usted permiso para ausentarme el día :</label>
                        <input type="date" class="form-control" name="dia_permiso">      
                    </div>
                   
                    <!-- Durante -->
                    <div class="mb-3">
                        <label for="durante" class="form-label">Durante:</label>
                        <select name="durante" class="form-control">
                            <option value="El siguiente horario">El siguiente horario</option>
                            <option value="Toda la Jornada">Toda la Jornada</option>
                        </select>                   
                    </div>                     

                    <!-- Desde, hasta en tiempo -->
                    <div class="row mb-3">
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">De las:</label></div>
                        <div class="col-6 themed-grid-col"><label for="Autoriza" class="form-label">A las:</label></div>
                        <div class="col-6 themed-grid-col"><input type="time" name="hora1" value="08:00:00" class="form-control"></div>
                        <div class="col-6 themed-grid-col"><input type="time" name="hora2" value="18:00:00" class="form-control"></div>
                    </div>

                    <!-- Sueldo -->
                    <div class="mb-3">
                        <!-- <label for="Durante" class="form-label">Sueldo:</label> -->
                        <select name="goc_sueldo" class="form-control">
                            <option value="Sin goce de sueldo">Sin goce de sueldo</option>
                            <option value="Con goce de sueldo">Con goce de sueldo</option>
                        </select>                   
                    </div> 

                    <!-- Debido a que -->
                    <div class="row mb-3">
                        <div class="mb-3">
                            <label for="retardo" class="form-label">Debido a que:</label>
                            <textarea name="motivo" rows="1"  class="form-control" required placeholder="Motivo por el cual me ausento ..."></textarea>
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
                
                    <input type="submit" class="btn btn-primary w-100" name="crearRegistro" value="Guardar" onclick="window.print();">
                </form>
            </div>
        </div>
    </div>
  </body>
</html>