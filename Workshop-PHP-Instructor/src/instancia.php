<?php
if(!isset($_SESSION['sessao'])) {
        header("Location: login.html");
        exit;
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

    <title>Red Hat Cloud Demo </title>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
<?php 
require_once("menu_esquerdo_completo.php");
?>

<?php
require_once("top_navigation.php");
?>
        <!-- page content -->
        <div class="right_col" role="main">

<div class="title_left">
                <h3>Ferramentas</h3>
              </div>



<p>Para seu workshop, foi criada uma instancia no google: <button type="button" class="btn btn-danger btn-xs">IP Instancia: <?php echo getenv("IP_INSTANCIA");?></button> </p>

<p>Voce possui algumas opções de conexao: </p>


<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Opcao #1: Wetty</h4>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            

<p>
<a href="<?php echo getenv("URL_WETTY");?>" target="_blank"> <img src="images/terminal.png" width=64 height=64 /><button type="button" class="btn btn-success btn-xs">Acessar Instancia</button></a> Logue como workshop/workshop e depois digite <h2><b><i>ssh <?php echo getenv('IP_INSTANCIA');?></i></b></h2>
</p>







                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Opcao #2: Putty ou SSH direto</h4>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            
<br>Faca o download da chave privada <a href="chaveprivada.key"><button type="button" class="btn btn-success btn-xs">Clique aqui para baixar a chave privada</button></a> <br>

Se utilizando SSH: ssh -i chaveprivada.key workshop@<?php echo getenv("IP_INSTANCIA");?><br>

<p></p>

<img src="images/putty_icon.png" width=64 height=64/>
Para utilizar o putty, faca as configuracoes conforme demonstrado abaixo. <a href="chaveprivada.key"><button type="button" class="btn btn-success btn-xs">Clique aqui para baixar a chave privada</button></a>

<br>1 - Digite workshop@IP da sua instancia no campo "Host Name", digite um nome no campo "Saved Sessions" e clique em "Save" <br>

<img src="images/putty1.png" />

<br>2 - Clique em "Auth" no menu Connection -> SSH -> Auth, marque a opcao "Allow agent forwarding" e clique em "Browse" para localizar a chave privada que voce baixou no link acima.<br>

<img src="images/putty2.png" />

<br>3 - Clique novamente em "Session", clique em "Save" novamente e clique em "Open"<br>

<img src="images/putty3.png" />




                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Opcao #3: Maquina Virtual</h4>
                        </a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                          

<br>1 - Escolha uma das imagens abaixo para download: <br>

<br><a href="http://cloud.centos.org/centos/7/images/CentOS-7-x86_64-GenericCloud.qcow2"><button type="button" class="btn btn-warning btn-xs">KVM</button></a><br>
<br><a href="https://atlas.hashicorp.com/centos/boxes/7"><button type="button" class="btn btn-success btn-xs">Vagrant</button></a><br><br>

<li>Ou peca um pen-drive para o instrutor.</li>



                          </div>
                        </div>
                      </div>
                    </div>







</div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
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
