<?php
if(!isset($_SESSION['sessao'])) {
        header("Location: login.html");
        exit;
}
require_once "Question.class.php";
$Question = new Question();
if(isset($_POST['cadastrar'])) {
    $Mopcoes = explode("\n", $_POST['opcoes']);
    $pergunta = $_POST['pergunta'];
    $Question->CadastraPergunta($pergunta, $Mopcoes);
}
if(isset($_POST['alterar'])) {
    $Mopcoes = explode("\n", $_POST['opcoes']);
    $pergunta = $_POST['pergunta'];
    $id_pergunta = intval($_POST['id_pergunta']);
    $Question->AlteraPergunta($id_pergunta, $pergunta, $Mopcoes);
}
if(isset($_POST['excluir'])) {
    $Mopcoes = explode("\n", $_POST['opcoes']);
    $pergunta = $_POST['pergunta'];
    $id_pergunta = intval($_POST['id_pergunta']);
    $Question->DeletaPergunta($id_pergunta);
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

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cadastro de Pergunta <small>Pode perguntar o que precisar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <?php
        if(isset($_GET['alterar']) or isset($_GET['excluir'])) {
                $id_pergunta = intval($_GET['id_pergunta']);
                $Objeto = BuscaPerguntaPorId($id_pergunta);
                print_r($Objeto);

                }
        ?>


                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="pergunta_rapida.php" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pergunta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="pergunta" name="pergunta" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Opcoes (1 por linha)<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="opcoes" name="opcoes" rows=6 required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>

                        </div>
                      </div>
                      
                      
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancelar</button>
                                                  <?php
                                                  if(isset($_GET['id_pergunta']) and isset($_GET['alterar'])) {
                                                  ?>
                          <button type="submit" name="alterar" class="btn btn-info">Alterar Pergunta</button>
                                                    <?php
                                                  } else {
                                                       if(isset($_GET['id_pergunta']) and isset($_GET['excluir'])) {
                                                  
                                                    ?>
                        <input type=hidden name="id_pergunta" value="<?php echo $_GET['id_pergunta'];?>">
                          <button type="submit" name="excluir" class="btn btn-danger">Remover Pergunta</button>
                          
                                                   <?php
                                                       } else {
                                                   ?>
                          
                          <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar Pergunta</button>
                          
                                                    <?php
                                                  }
                                                  }
                                                    ?>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
        
        
        
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perguntas Cadastradas <small>Painel de Operacao</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">ID Pergunta </th>
                            <th class="column-title">Pergunta</th>
                            <th class="column-title">Respostas </th>
                            <th class="column-title no-link last"><span class="nobr">Acao</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <?php
                          $Mperguntas = $Question->BuscaPerguntas();
                          for($x=0;$x<sizeof($Mperguntas);$x++) {
                                $id_pergunta = $Mperguntas[$x]['id_pergunta'];
                                $pergunta = $Mperguntas[$x]['pergunta'];
                                $respostas = $Mperguntas[$x]['respostas'];
                          ?>

                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?php echo $id_pergunta;?></td>
                            <td class=" "><?php echo $pergunta;?></td>
                            <td class=" "><?php echo $respostas;?></td>
                      
                            <td class=" last"><a href="pergunta_rapida.php?alterar=S&id_pergunta=<?php echo $id_pergunta;?>"><button type="button" class="btn btn-info btn-xs">Editar Pergunta</button></a><a href="javascript:Ativar('<?php echo $id_pergunta;?>')"><button type="button" class="btn btn-success btn-xs">Ativar</button></a><a href="pergunta_rapida.php?excluir=S&id_pergunta=<?php echo $id_pergunta;?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></a>
                            </td>
                          </tr>
                          
                          <?php
                          }
                          ?>
                          
                        </tbody>
                      </table>
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
    
    <script>
        function Ativar(id_pergunta) {
            alert(id_pergunta);
        }
        </script>

  </body>
</html>