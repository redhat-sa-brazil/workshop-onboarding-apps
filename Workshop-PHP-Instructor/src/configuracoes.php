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

<?php
// =================================
// Rotina para Criacao e populacao de Esquema
// =================================
require_once "config.php";
$Db = new Db;
$Db->CreateSchema();
$Db->PopulateAreas();
$Db->m_close();


// =================================
// Variaveis de arquivo
// =================================
$config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
$arquivo_json = "/etc/ansible/playbooks/gce.json";
$chave_ssh = "/etc/ansible/playbooks/ssh_gce";


// =================================
// Salva Configuracoes
// =================================
if(isset($_POST['salvar'])) {

	// =====================
	// Salvando conteudo
	// =====================
	$fpj = fopen("$arquivo_json", "w+");
	$contj = $_POST['json_gce'];
	fputs($fpj, "$contj");
	fclose($fpj);

        $fps = fopen("$chave_ssh", "w+");
        $conts = $_POST['chave_ssh'];
        fputs($fps, "$conts");
        fclose($fps);


	$service_account_email = $_POST['service_account_email'];
	$project_id = $_POST['project_id'];
	$usuario_ssh_gce = $_POST['usuario_ssh_gce'];
	$cluster_openshift = $_POST['cluster_openshift'];
	$nome_projeto_openshift = $_POST['nome_projeto_openshift'];
	$token_openshift = $_POST['token_openshift'];
	$email_remetente = $_POST['email_remetente'];
	$senha_email = $_POST['senha_email'];
	$nome_workshop = $_POST['nome_workshop'];
	$endereco_tower = $_POST['endereco_tower'];
	$url_wetty = $_POST['url_wetty'];
	$link_form_feedback = $_POST['link_form_feedback'];


	$conteudo = "
service_account_email: $service_account_email
credentials_file: $arquivo_json
project_id: $project_id
chave_ssh: $chave_ssh
usuario_ssh_gce: $usuario_ssh_gce
cluster_openshift: $cluster_openshift
nome_projeto_openshift: $nome_projeto_openshift
token_openshift: $token_openshift
email_remetente: $email_remetente
nome_workshop: $nome_workshop
endereco_tower: $endereco_tower
senha_email: $senha_email
url_wetty: $url_wetty
link_form_feedback: $link_form_feedback
";

	$fp = fopen("$config_yaml", "w+");
	fputs($fp, $conteudo);
	fclose($fp);

}

// =================================
// Carrega configuracoes salvas
// =================================
$Matriz = file("$config_yaml");
$Vars = array();
for($x=0;$x<sizeof($Matriz);$x++) {
        $linha = $Matriz[$x];
        $Sub = explode(": ", $linha);
        $chave = $Sub[0];
        $valor = $Sub[1];
        $Vars[$chave] = $valor;
}

$conteudo_chave_ssh = file_get_contents("$chave_ssh");
$conteudo_json_gce = file_get_contents("$arquivo_json");

$cluster_openshift_env = getenv("CLUSTER_OPENSHIFT");
if($cluster_openshift_env != "") {
	$Vars['cluster_openshift'] = $cluster_openshift_env;
}

$token_openshift_env = getenv("TOKEN_OPENSHIFT");
if($token_openshift_env != "") {
	$Vars['token_openshift'] = $token_openshift_env;
}


$wetty_url_env = getenv("WETTY_URL");
if($wetty_url_env != "") {
	$Vars['url_wetty'] = $wetty_url_env;
}
?>

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Configuracoes Gerais</h3>
              </div>

            </div>
            <div class="clearfix"></div>




<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Configuracoes Gerais <small>configuracoes gerais do Workshop</small></h2>
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
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Service Account email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="service_account_email" id="service_account_email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $Vars['service_account_email'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Project ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="project_id" name="project_id" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $Vars['project_id'];?>">
                        </div>
                      </div>
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Json GCE<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="json_gce" name="json_gce" required="required" class="form-control" name="message" rows="10"><?php echo $conteudo_json_gce;?></textarea>
			</div>
                      </div>
	 		<div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">SSH GCE <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="chave_ssh" name="chave_ssh" required="required" class="form-control" name="message" rows="10"><?php echo $conteudo_chave_ssh;?></textarea>
			</div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario SSH (GCE) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="usuario_ssh_gce" name="usuario_ssh_gce" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['usuario_ssh_gce'];?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cluster Openshift<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cluster_openshift" name="cluster_openshift" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['cluster_openshift'];?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Projeto Openshift<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nome_projeto_openshift" name="nome_projeto_openshift" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['nome_projeto_openshift'];?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Token Openshift<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="token_openshift" name="token_openshift" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['token_openshift'];?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Remetente<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email_remetente" name="email_remetente" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['email_remetente'];?>">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="senha_email" name="senha_email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password"  value="<?php echo $Vars['senha_email'];?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Workshop<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nome_workshop" name="nome_workshop" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['nome_workshop'];?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Endereco Ansible Tower<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="endereco_tower" name="endereco_tower" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['endereco_tower'];?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Url Wetty<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url_wetty" name="url_wetty" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['url_wetty'];?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Formulario Feedback<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="link_form_feedback" name="link_form_feedback" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $Vars['link_form_feedback'];?>">
                        </div>
                      </div>




                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<input type="hidden" name="salvar" value="Salvar">
                          <button type="submit" class="btn btn-success" onclick="this.form.submit();">Salvar</button>
                        </div>
                      </div>

                    </form>
                  </div>
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
