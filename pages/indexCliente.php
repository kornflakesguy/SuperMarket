<?php
session_start();
if ($_SESSION["tipousuario"]=="Cliente" || $_SESSION["tipousuario"]=="Empleado" || $_SESSION["tipousuario"]=="invitado") {
include "conexion.php";
        $consulta  = "select count(idadministradores) as administradores from administradores";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
        while ($fila = $resultado->fetch_object()) {
          $administradores=$fila->administradores;
            }
         }
         $consulta  = "select count(idclientes) as clientes from clientes";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
        while ($fila = $resultado->fetch_object()) {
          $clientes=$fila->clientes;
    }
  }
        $consulta  = "select count(idempleados) as empleados from empleados";
        $resultado = $conexion->query($consulta);
        if ($resultado) {
        while ($fila = $resultado->fetch_object()) {
          $empleados=$fila->empleados;
    }
  }

  $consulta  = "select count(idproductos) as productos from productos";
  $resultado = $conexion->query($consulta);
  if ($resultado) {
  while ($fila = $resultado->fetch_object()) {
    $productos=$fila->productos;
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

    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script type="text/javascript">
    function ajaxCarrito(id,precioV,opcion)
    {

      if (opcion!=0) {
        alert("El producto es:"+id+" y la cantidad deseada es: "+document.getElementById(""+id).value+"A :"+precioV);
        alert(opcion);
        var cantidad=document.getElementById(""+id).value;
      }
      if (id==""){
        document.getElementById("carrito").innerHTML="";
        return;
      }
      if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();
    }else  {// code for IE6, IE5
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
      if (xmlhttp.readyState==4 && xmlhttp.status==200){
        document.getElementById("carrito").innerHTML=xmlhttp.responseText;
      }
    }
    //opciones para el carrito
          if(opcion=="agregar")
          {
            xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion="+opcion+"&cantidad="+cantidad+"&precio="+precioV,true);
            xmlhttp.send();
          }
          if(opcion=="quitar")
          {
            xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion="+opcion+"&cantidad="+cantidad+"&precio="+precioV,true);
            xmlhttp.send();

          }
          if(opcion==0)
          {
            xmlhttp.open("GET","ajaxCarrito.php?id="+id+"&opcion=mostrar",true);
            xmlhttp.send();
          }

    }
    </script>
  </head>

  <body class="nav-md" onload="ajaxCarrito('0','0','0');">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="indexAdmin.php" class="site_title"><i class="fa fa-shopping-basket"></i><span>Super Market</span></a>
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
           <?php
            include "menuCliente.php";
           ?>
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
          <!-- top tiles -->
          <div class="row tile_count">

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-lock"></i> Total de Administradores</span>
              <div class="count"><?php echo $administradores ?></div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total de Clientes</span>
              <div class="count"><?php echo $clientes ?></div>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Empleados</span>
              <div class="count"><?php echo $empleados ?></div>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-shopping-bag"></i> Total de Productos.</span>
              <div class="count"><?php echo $productos ?></div>

            </div>
            
          </div>
          <!-- /top tiles -->
          <br />
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
<?php
}else {

  header('Location: indexAdmin.php');
}

 ?>
