<?php 
$id = $_REQUEST["id"];
include "conexion.php";
$result = $conexion->query("select * from administradores where idadministradores=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idadministradoresR = $fila->idadministradores;
        $nombreadministradoresR    = $fila->nombreadministradores;
        $apellidoadministradoresR    = $fila->apellidoadministradores;
        $direccionR = $fila->direccion;
        $latitudR   = $fila->latitud;
        $longitudR  = $fila->longitud;
        $telefonoR = $fila->telefono;
        $fotoadministradoresR = $fila->fotoadministradores;
        $idusuarioR=$fila->idusuario;

        //esta linea es importante :'v'
        $consulta="select contrasena as contrasena from usuarios where idusuario ='".$idusuarioR."'";
        $result2=$conexion->query($consulta);
        if ($result2) {
          while ($fila2 = $result2->fetch_object()) {
                 $contrasenaR=$fila2->contrasena;
                }
          }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Super Market | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!--Scripts de validaciones-->
    <script type="text/javascript">
      function retornar()
      {
        document.location.href='listaadministradores.php';
      }
      function verificar(){
          if(document.getElementById('nombreAdministrador').value=="" ||
            document.getElementById('apellidoAdministrador').value=="" ||
            document.getElementById('direccionAdministrador').value=="" ||
            document.getElementById('telefonoAdministrador').value=="" ||           
            document.getElementById('usuarioAdministrador').value=="" ||
            document.getElementById('contraseñaAdministrador').value=="" ||
            document.getElementById('latitud').value=="" ||
            document.getElementById('longitud').value==""){
            alert("Complete los campos");
          }else{
            document.getElementById('bandera').value="add";

           document.super.submit();
          }

        }

    </script>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-star"></i> <span>Super Market!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenido,</span>
                <h2>Fernndo</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php include "menu.php" ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">Fernando

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Ajustes</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->



        <!-- page content -->


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>administradores</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Busqueda...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ir!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modificar <small>Datos del Administrador.</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="super" id="super" action="" method="POST" enctype="multipart/form-data">
                      <!-- AUXILIARES -->
<input type="hidden" name="bandera" id="bandera">
<input type="hidden" name="baccion" id="baccion" value="<?php echo $idadministradoresR;?>">
<input type="hidden" name="usuarioAnterior" id="usuarioAnterior" value="<?php echo $idusuarioR;?>">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="usuarioAdministrador" name="usuarioAdministrador" placeholder="Usuario" value="<?php echo $idusuarioR;?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="contraseñaAdministrador" name="contraseñaAdministrador" placeholder="Contraseña" value="<?php echo $contrasenaR;?>">
                        <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombreAdministrador" name="nombreAdministrador" placeholder="Nombre" value="<?php echo $nombreadministradoresR;?>">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="apellidoAdministrador" name="apellidoAdministrador" placeholder="Apellido" value="<?php echo $apellidoadministradoresR;?>">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="telefonoAdministrador" name="telefonoAdministrador" placeholder="Telefono" value="<?php echo $telefonoR;?>">
                        <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                      </div>

                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="direccionAdministrador" name="direccionAdministrador" placeholder="Direccion" value="<?php echo $direccionR;?>">
                        <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="latitud" name="latitud" placeholder="Latitud" value="<?php echo $latitudR;?>">
                        <span class="fa fa-compass form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" id="longitud" name="longitud" placeholder="Longitud" value="<?php echo $longitudR;?>">
                        <span class="fa fa-compass form-control-feedback right" aria-hidden="true"></span>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotografía</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-text" id="imagen" name="imagen" accept="image/jpg,image/png,image/jpeg">
                        </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="verificar()">Modificar</button>
                          <button class="btn btn-primary" type="reset" onclick="retornar()">Cancelar</button>
                          
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
 <!-- DIV PARA PONER EL MAPA PARA administradores-->
            
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>MAPA <small>Mapa Administrador.</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="embed-responsive embed-responsive-4by3">
                              <iframe src="ej.php?lat=<?php echo $latitudR; ?>&lon=<?php echo $longitudR; ?>" class="embed-responsive-item" allowfullscreen></iframe>
                            </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include 'footer.php'; ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>

<?php
include "conexion.php";
$bandera          = $_REQUEST["bandera"];
$baccion          = $_REQUEST["baccion"];
$nombreAdministrador    = $_REQUEST["nombreAdministrador"];
$apellidoAdministrador  = $_REQUEST["apellidoAdministrador"];
$duiAdministrador       = $_REQUEST["duiAdministrador"];
$telefonoAdministrador  = $_REQUEST["telefonoAdministrador"];
$direccionAdministrador = $_REQUEST["direccionAdministrador"];
$latitud = $_REQUEST["latitud"];
$longitud = $_REQUEST["longitud"];
$usuarioAdministrador = $_REQUEST["usuarioAdministrador"];
$usuarioAnterior=$_REQUEST["usuarioAnterior"];
$contrasenaAdministrador = $_REQUEST["contraseñaAdministrador"];
$imagen = $_REQUEST["imagen"];
$tipoUsuario="Administrador";

//ahora hay que agregar la pinche imagen alv :'v
if ($bandera == "add") {
  if($_FILES['imagen']['name']==null){
    msg("Modificara solo usuario");
        $consulta  = "UPDATE usuarios set idusuario='" . $usuarioAdministrador . "',contrasena='" . $contrasenaAdministrador . "' where idusuario='" . $usuarioAnterior . "'";
        
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito Usuario");
        } else {
            msg("No Exito Usuario");
        }

        $consultae  = "UPDATE administradores set nombreadministradores='" . $nombreAdministrador . "',apellidoadministradores='" . $apellidoAdministrador . "',direccion='" . $direccionAdministrador . "',latitud='" . $latitud . "',longitud='" . $longitud . "',telefono='" . $telefonoAdministrador . "' where idadministradores='" . $baccion . "'";       
        $resultado = $conexion->query($consultae);
        if ($resultado) {
            msg("Exito Administrador");
        } else {
            msg("No Exito Administrador");
        }
      }else{
       $permitidos = array("image/jpg", "image/jpeg", "image/png");
    $limite_kb  = 16384; //tamanio maximo que permitira subir, es el limite de medium blow(16mb)
    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024) {
        //Este es el archivo temporaral.
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        //este es el tipo de archivo
        $tipo = $_FILES['imagen']['type'];
        //leer el archivo temporarl en binario
        $fp   = fopen($imagen_temporal, 'r+b');
        $data = fread($fp, filesize($imagen_temporal));
        fclose($fp);
        //escapar los caracteres
        $data      = mysqli_real_escape_string($conexion, $data);
        $consulta  = "UPDATE usuarios set idusuario='" . $usuarioAdministrador . "',contrasena='" . $contrasenaAdministrador . "' where idusuario='" . $usuarioAnterior . "'";
        
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito Usuario");
        } else {
            msg("No Exito Usuario");
        }


        $consulta  = "UPDATE administradores set nombreadministradores='" . $nombreAdministrador . "',apellidoadministradores='" . $apellidoAdministrador . "',direccion='" . $direccionAdministrador . "',latitud='" . $latitud  . "',longitud='" . $longitud . "',telefono='" . $telefonoAdministrador . "',fotoadministradores='" . $data . "',tipofotoc='" . $tipo . "',idusuario='" . $usuarioAdministrador . "' where idadministradores='".$baccion."'";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito Administrador");
        } else {
            msg("No Exito Administrador");
        }


    }
  }


}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaadministradores.php';";
    echo "</script>";
}
?>