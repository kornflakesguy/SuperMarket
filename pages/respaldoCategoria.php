<?php session_start(); ?>
<?php
include "conexion.php";
$result = $conexion->query("select * from empleados where idempleados=" . $id);
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
          if(document.getElementById('categoria').value=="" ){
            alert("Complete los campos.");
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
                <h3>Productos</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-4">
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





                       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="categoria" name="categoria" placeholder="Categoria">
                        <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                      </div>




                      <div class="form-group">

                        <div class="col-md-9 col-sm-9 col-xs-12">

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
 <!-- DIV PARA PONER LA TABLA DE CATEGORIAS-->


   <div class="col-md-8 col-sm-8 col-xs-8">
     <div class="x_panel">
       <div class="x_title">
         <h2>Proveedores <small>Listado</small></h2>

         <div class="clearfix"></div>
       </div>
       <div class="x_content">
         <p class="text-muted font-13 m-b-30">
           Resultados por pagina.
         </p>
         <table id="datatable" class="table table-striped table-bordered">
           <thead>
             <tr>


               <th>Nombre</th>
               <th>Direccion</th>
               <th>Estado</th>
               <th>Activar/Desactivar</th>
               <th>Modificar</th>
               <th>Ubicacion</th>
             </tr>
           </thead>
           <tbody>
             <?php
           include 'conexion.php';
           $result = $conexion->query("select * from proveedores");
           if ($result) {
             while ($fila = $result->fetch_object()) {
               echo "<tr>";
               $proveedor=$fila->idproveedor;
               echo "<td>".$fila->nombre."</td>";
               echo "<td>".$fila->direccion."</td>";
               if ($fila->estado==1) {
                 echo "<td style='text-align:center;width:40px;'>Activo</td>";
                 echo "<td style='text-align:center;width:40px;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $proveedor . ",1);><i class='fa fa-remove'></i>
                    </button></td>";
               }else {
                 echo "<td style='text-align:center;width:40px;'>Inactivo </td>";
                 echo "<td style='text-align:center; width:40px;'><button align='center' type='button' class='btn btn-default' onclick=confirmar(" . $proveedor . ",2);><i class='fa fa-check'></i>
                    </button></td>";
               }
               echo "<td style='text-align:center;width:40px;'><button align='center' type='button' class='btn btn-default' onclick=modificar(" . $proveedor . ");><i class='fa fa-edit'></i>
                </button></td>";


             echo "<td style='text-align:center;width:40px;'><button align='center' type='button' class='btn btn-default' onclick='llamarPaginaMapa(" . $fila->latitud . "," . $fila->longitud . ")'>
               <i class='fa fa-map-marker'></i>
                </button></td>";
               echo "</tr>";
                }
           }
            ?>
           </tbody>
         </table>
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
$categoria    = $_REQUEST["categoria"];
msg($categoria);
//ahora hay que agregar la pinche imagen alv :'v
if ($bandera == "add") {
  $consulta2  = "INSERT INTO categorias VALUES('null','" . $categoria . "')";
  $resultadoCat = $conexion->query($consulta2);
        if ($resultadoCat) {
          msg("Exito Categoria");
        }else
        {
          msg("Error Categoria.");
        }
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>
