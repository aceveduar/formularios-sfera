<?php include 'conexion.php'; ?>
<?php
    //Crear y seleccionar query
    $query = "SELECT * FROM usuarios ORDER BY id DESC";
    $usuarios = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link href="css/estilos.css" rel="stylesheet"> -->
    <style> a {text-decoration: none;}</style>
    <title>Formatos y permisos</title>
  </head>
  <body>
    <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-7 text-center">
              <nav class="navbar navbar-light bg-white">
                <a class="navbar-brand pt-3" href="#">
                  <img src="img/logo_SFERA.png" width="100" alt="Logo Sfera" class="pb-3">
                </a>
              </nav>
              <!-- <p style="font-size: 10px; color:#ffffff">a</p> -->
                  <h1 class="display-4 pt-4">Formatos y permisos</h1>
                  <hr class="bg-info">
                  
                  <?php if(isset($_GET['mensaje'])) : ?>                
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo $_GET['mensaje']; ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  <?php endif; ?>

                  <div class="list-group">
                    <a href="aviso_y_Autorizacion.php" class="list-group-item py-3 list-group-item-action list-group-item-primary">Aviso y Autorización de Retardo o Salida Antes de Hora</a>
                    <a href="autorizacion_de_retardo.php" class="list-group-item py-3 list-group-item-action list-group-item-primary">Autorización de Retardo en el Ingreso a las Labores</a>
                    <a href="autorizacion_a_Trabajar.php" class="list-group-item py-3 list-group-item-action list-group-item-primary">Autorización a Trabajar Día(s) no Laborable(s)</a>
                    <a href="permiso_de_Salida.php" class="list-group-item py-3 list-group-item-action list-group-item-primary">Permiso de Salida En horario Laboral</a>
                    <a href="solicitud_de_Vacaciones.php" class="list-group-item py-3 list-group-item-action list-group-item-primary">Solicitud de Vacaciones</a>
                  </div>
              </div>
          </div>
      </div>

       
        <footer class="pt-5 bg-white text-center py-2 lead">
          <a class="lead text-secondary">Recursos Humanos Sfera Media Group</a> 
        </footer>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
   

  </body>
</html>