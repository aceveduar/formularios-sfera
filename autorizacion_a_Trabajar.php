<?php
    //Incluimos conexión
    include 'conexion.php';

    if(isset($_POST['crearRegistro'])){
        $fecha_crea = mysqli_real_escape_string($con, $_POST['fecha_crea']);
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $departamento = mysqli_real_escape_string($con, $_POST['departamento']);
        $dias = mysqli_real_escape_string($con, $_POST['dias']);
        $daterange = mysqli_real_escape_string($con, $_POST['daterange']);
        $compensacion = mysqli_real_escape_string($con, $_POST['compensacion']);
        $motivo = mysqli_real_escape_string($con, $_POST['motivo']);
        $solicita = mysqli_real_escape_string($con, $_POST['solicita']);
        $autoriza = mysqli_real_escape_string($con, $_POST['autoriza']);

        //Configurar tiempo zona horaria
        date_default_timezone_set('america/mexico_city');
        $time = date('h:i:s a', time());

        //Validaciones
        if(!isset($fecha_crea) || $fecha_crea == '' || !isset($nombre) || $nombre == '' || !isset($departamento) || $departamento == '' || !isset($dias) || $dias == '' || !isset($daterange) || $daterange == '' || !isset($compensacion) || $compensacion == '' || !isset($motivo) || $motivo == '' || !isset($solicita) || $solicita == '' || !isset($autoriza) || $autoriza == ''){
            $error = "Algunos campos están vacíos";
        }else{
            $query = "INSERT INTO autorizacion_a_trabajar(fecha_crea, nombre, departamento, dias, daterange, compensacion, motivo, solicita, autoriza)
                        VALUES('$fecha_crea','$nombre','$departamento','$dias','$daterange','$compensacion', '$motivo', '$solicita', '$autoriza')";

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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <!-- Calendario de rangos -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="js\daterange.js"></script> <!-- Traducimos el calendrio -->

    <title>Autorización a Trabajar Día(s) no Laborable(s)</title>
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
                            <img src="img/logo_SFERA.png" width="100" alt="Logo Sfera">
                    </form>
                </nav>
                
                <h4 class="font-weight-normal pt-2">Autorización a Trabajar Día(s) no Laborable(s)</h4>
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
                    
                    <!-- Dia No laboral para trabajar -->
                    <div class="mb-3">
                        <label for="dias" class="form-label">Por la presente se autoriza a trabajar:</label>
                        <select name="dias" class="form-control">
                            <option value="1">1 día no laboral</option>
                            <option value="2">2 días no laborales</option>
                            <option value="3">3 días no laborales</option>
                            <option value="4">4 días no laborales</option>
                            <option value="5">5 días no laborales</option>
                        </select>                   
                    </div>

                    <!-- Rango de fechas -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">En la(s) siguiente(s) fecha(s):</label>
                        <input type="text" name="daterange" class="form-control"/>
                    </div>

                    <!-- Motivo -->
                    <div class="mb-3">
                        <label for="retardo" class="form-label">Motivo:</label>
                        <textarea name="motivo" rows="2 "  class="form-control" required placeholder="Trabajaré en día no laboral porque ..."></textarea>
                    </div>
                   

                    <!-- Compensación -->
                    <div class="mb-3">
                        <label for="compensacion" class="form-label">Compensación:</label>
                        <select name="compensacion" class="form-control">
                            <option value="Field / Operaciones">Día(s) de vacacion(es)</option>
                            <option value="Comercial / Ventas">Pago via nomina</option>
                        </select>                   
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