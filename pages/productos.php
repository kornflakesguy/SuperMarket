<?php session_start();

 ?>
<?php
include "conexion.php";
$result = $conexion->query("select * from productos");
$numeroProductos=$result->num_rows+1;
$codigoProd=sprintf("%08d",$numeroProductos);
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

      function prueba()
      {
        document.getElementById("codigoProducto").value=document.getElementById("barcode").value;
      }
      function verificar(){
          if(document.getElementById('codigoProducto').value=="" ||
            document.getElementById('nombreProducto').value==""  ||
            document.getElementById('descripcion').value==""  ||
            document.getElementById('stockMin').value=="" ||
            document.getElementById('margen').value=="" ||
            document.getElementById('proveedor').value=="" ||
            document.getElementById('categoria').value=="" ||
            document.getElementById('imagen').value==""){
            alert("Complete los campos");
          }else{
            document.getElementById('bandera').value="add";
            alert(document.getElementById('codigoProducto').value);
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
              <a href="../index.php" class="site_title"><i class="fa fa-star"></i> <span>Super Market!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="../index.php" class="site_title"><i class="fa fa-user"></i></a>
              </div>
              <div class="profile_info">
                <span>Bienvenido ,</span>
                <h2><?php echo $_SESSION['usuario']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php   if ($_SESSION["tipousuario"]=="invitado") {
                include "menuCliente.php";
              }else {
                include "menu.php";
              } ?>
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
          <?php
          if ($_SESSION["tipousuario"]=="invitado") {
            include "navBarInvitado.php";
          }else {
            include "navBarUser.php";
          }
           ?>
        </div>
        <!-- /top navigation -->



        <!-- page content -->


        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Productos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Registro <small>Datos del producto.</small></h2>

                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form class="form-horizontal form-label-left input_mask" name="super" method="POST" enctype="multipart/form-data">
                      <!-- AUXILIARES -->
<input type="hidden" name="bandera" id="bandera">
<input type="hidden" name="baccion" id="baccion">
<input type="hidden" name="barcode" id="barcode" value="<?php echo $codigoProd; ?>">

                    <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left " id="codigoProducto" name="codigoProducto" placeholder="Codigo Producto" >
                        <span class="fa fa fa-barcode form-control-feedback left" aria-hidden="true"></span>
                        <button  data-toggle="tooltip" data-placement="top" title="Generar Codigo" align='center' type='button' class='btn btn-default' onclick="prueba();"><i class='fa fa-barcode'></i>
                        </button>
                    </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="nombreProducto" name="nombreProducto" placeholder="Nombre">
                        <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control has-feedback-left" id="stockMin" name="stockMin" placeholder="Stock Minimo" min="1">
                        <span class="fa fa- fa-sort-numeric-desc form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="number" class="form-control has-feedback-left" id="margen" name="margen" placeholder="Margen de Ganancia">
                        <span class="fa fa-percent form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <select class="select2" name="proveedor" id="proveedor" style="width:260px; height:37px;">
                          <option value="">Seleccione el proveedor.</option>
                          <?php
                          include "conexion.php";
                          $result = $conexion->query("select * from proveedores");
                          if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->idproveedor."'>".$fila->nombre."</option>";
                              }
                            }

                           ?>
                        </select>
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <select class="select2" name="categoria" id="categoria" style="width:260px; height:37px;">
                          <option value="">Seleccione la categoria del producto.</option>
                          <?php
                          include "conexion.php";
                          $result = $conexion->query("select * from categorias");
                          if ($result) {
                              while ($fila = $result->fetch_object()) {
                                echo "<option value='".$fila->idcategoria."'>".$fila->categoria."</option>";
                              }
                            }
                           ?>
                        </select>
                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="descripcion" name="descripcion" placeholder="Descripcion.">
                        <span class="fa fa-commenting form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Fotografía</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="file" class="form-text" id="imagen" name="imagen" required accept="image/jpg,image/png,image/jpeg">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-primary" onclick="verificar()">Agregar</button>
                          <button class="btn btn-primary" type="reset">Cancelar</button>

                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
 <!-- DIV PARA PONER EL MAPA PARA EmpleadoS-->
 <div class="col-md-6 col-sm-6 col-xs-6">
   <div class="x_panel">
     <div class="x_title">
       <img src="images/productos.jpg" style="height:500px; width:600px; aligned:center;">
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
include "../config/conexion.php";
$bandera          = $_REQUEST["bandera"];
$nombreProducto    = $_REQUEST["nombreProducto"];
$codigoProducto  = $_REQUEST["codigoProducto"];
$descripcion  = $_REQUEST["descripcion"];
$stockMin = $_REQUEST["stockMin"];
$margen = $_REQUEST["margen"];
$proveedor = $_REQUEST["proveedor"];
$categoria = $_REQUEST["categoria"];
$imagenProducto = $_REQUEST["imagen"];
$precioProducto=0;
$cantidadProducto=0;
$disponibilidad=0;
if ($bandera == "add") {
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
        msg($codigoProducto);
        msg($nombreProducto);
        msg($precioProducto);
        msg($cantidadProducto);
        msg($tipo);
        msg($categoria);
        msg($disponibilidad);
        msg($stockMin);
        msg($proveedor);
        msg($margen);
        msg($descripcion);
        $consulta  = "INSERT INTO productos VALUES('null','" . $codigoProducto . "','" . $nombreProducto . "',' 0 ',' 0 ','" . $data . "','" . $tipo . "','" . $categoria  . "',' 0
        ','" . $stockMin . "','" . $proveedor . "','" . $margen . "','" . $descripcion . "','0')";
        msg($consulta);
        $resultado = $conexion->query($consulta);
        if ($resultado) {
            msg("Exito");
        } else {
            msg(mysqli_error($conexion));
        }
    }

}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>
