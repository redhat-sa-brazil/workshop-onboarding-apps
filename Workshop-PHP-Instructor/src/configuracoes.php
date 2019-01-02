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


$Instructor = new Instructor;


// =================================
// Variaveis de arquivo
// =================================
$config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
$config_yaml_pv = "/workshop-pv/config.yml";
$arquivo_json = "/etc/ansible/playbooks/gce.json";
$arquivo_json_pv = "/workshop-pv/gce.json";
$ssh_private_key = "/etc/ansible/playbooks/ssh";
$ssh_private_key_pv = "/workshop-pv/ssh_gce";


// =================================
// Salva Configuracoes
// =================================
if(isset($_POST['salvar'])) {

	// =====================
	// Salvando conteudo
	// =====================
	$fpj = fopen("$arquivo_json", "w+");
	$contj = $_POST['gce_json'];
	fputs($fpj, $contj);
	fclose($fpj);

        $fps = fopen("$ssh_private_key", "w+");
        $conts = $_POST['ssh_private_key'];
        fputs($fps, "$conts");
        fclose($fps);

	// =============================
	// Salvando conteudo Persistente
	// =============================

        $fpj = fopen("$arquivo_json_pv", "w+");
        $contj = $_POST['gce_json'];
        fputs($fpj, $contj);
        fclose($fpj);

        $fps = fopen("$ssh_private_key_pv", "w+");
        $conts = $_POST['ssh_private_key'];
        fputs($fps, "$conts");
        fclose($fps);


	$gce_sa_email = $_POST['gce_sa_email'];
	$gce_project_id = $_POST['gce_project_id'];
	$ssh_user = $_POST['ssh_user'];
  
	$cluster_openshift = $_POST['cluster_openshift'];
	$nome_projeto_openshift = $_POST['nome_projeto_openshift'];
	$token_openshift = $_POST['token_openshift'];
	$email_remetente = $_POST['email_remetente'];
	$senha_email = $_POST['senha_email'];
	$nome_workshop = $_POST['nome_workshop'];
	$url_ansible_tower = $_POST['url_ansible_tower'];
	$url_wetty = $_POST['url_wetty'];
	$link_form_feedback = $_POST['link_formulario_feedback'];
	$tipo_workshop = $_POST['tipo_workshop'];
	$url_etherpad = $_POST['url_etherpad'];


	$conteudo = "
gce_sa_email: $gce_sa_email
credentials_file: $arquivo_json
gce_project_id: $gce_project_id
ssh_private_key: $ssh_private_key
ssh_user: $ssh_user
cluster_openshift: $cluster_openshift
nome_projeto_openshift: $nome_projeto_openshift
token_openshift: $token_openshift
email_remetente: $email_remetente
nome_workshop: $nome_workshop
url_ansible_tower: $url_ansible_tower
senha_email: $senha_email
url_wetty: $url_wetty
link_form_feedback: $link_form_feedback
tipo_workshop: $tipo_workshop
url_etherpad: $url_etherpad
salvo: true
";

	// Salvando em efemero
	$fp = fopen("$config_yaml", "w+");
	fputs($fp, $conteudo);
	fclose($fp);


	// Salvando em persistente
        $fp = fopen("$config_yaml_pv", "w+");
        fputs($fp, $conteudo);
        fclose($fp);
  // Salvando em Database:
  $gce_json = $_POST['gce_json'];
  $ssh_private_key = $_POST['ssh_private_key'];
  $id_tipo_workshop = $_POST['tipo_workshop'];


  $aws_access_key = $_POST['aws_access_key'];
  $aws_secret_key = $_POST['aws_secret_key'];
  $aws_vpc_network = $_POST['aws_vpc_network'];
  $aws_subnet_id = $_POST['aws_subnet_id'];
  $aws_security_group = $_POST['aws_security_group'];
  $aws_key_name = $_POST['aws_key_name'];
  $link_formulario_feedback = $_POST['link_formulario_feedback'];
  $provider = $_POST['provider'];

  $Instructor->gce_project_id = "$gce_project_id";
  $Instructor->gce_sa_email = "$gce_sa_email";
  $Instructor->gce_json = $gce_json;
  $Instructor->ssh_private_key = "$ssh_private_key";
  $Instructor->aws_access_key = "$aws_access_key";
  $Instructor->aws_secret_key = "$aws_secret_key";
  $Instructor->aws_vpc_network = "$aws_vpc_network";
  $Instructor->aws_subnet_id = "$aws_subnet_id";
  $Instructor->aws_security_group = "$aws_security_group";
  $Instructor->aws_key_name = "$aws_key_name";
  $Instructor->ssh_user = "$ssh_user";
  $Instructor->cluster_openshift = "$cluster_openshift";
  $Instructor->nome_projeto_openshift = "$nome_projeto_openshift";
  $Instructor->token_openshift = "$token_openshift";
  $Instructor->email_remetente = "$email_remetente";
  $Instructor->senha_email = "$senha_email";
  $Instructor->nome_workshop = "$nome_workshop";
  $Instructor->url_ansible_tower = "$url_ansible_tower";
  $Instructor->url_wetty = "$url_wetty";
  $Instructor->url_etherpad = "$url_etherpad";
  $Instructor->link_formulario_feedback = "$link_formulario_feedback";
  $Instructor->provider = "$provider";
  $Instructor->id_tipo_workshop = "$id_tipo_workshop";
  
  $Instructor->SalvaConfigDb();
  $Instructor->GeraConfigFiles();
}






// =================================
// Carrega configuracoes salvas
// =================================

if(file_exists($config_yaml_pv)) {
	$Matriz = file("$config_yaml_pv");
} else {
	$Matriz = file("$config_yaml");
}
$Vars = array();
for($x=0;$x<sizeof($Matriz);$x++) {
        $linha = $Matriz[$x];
	if(ereg(":", $linha)) {
        	$Sub = explode(": ", $linha);
        	$chave = $Sub[0];
        	$valor = $Sub[1];
        	$Vars[$chave] = $valor;
	}
}
if(file_exists($ssh_private_key_pv)) {
	$conteudo_ssh_private_key = file_get_contents("$ssh_private_key_pv");
} else {
	$conteudo_ssh_private_key = file_get_contents("$ssh_private_key");
}
if(file_exists($arquivo_json_pv)) {
	$conteudo_gce_json = file_get_contents("$arquivo_json_pv");
} else {
	$conteudo_gce_json = file_get_contents("$arquivo_json");
}

if(file_exists($arquivo_json_pv)) {
	$JsonGCE = json_decode(file_get_contents("$arquivo_json_pv"));
} else { 
	$JsonGCE = json_decode(file_get_contents("/etc/ansible/workshop-stuff/conteudo_gce_json.json"));
}

if(!isset($Vars['salvo'])) {
	$Vars['gce_project_id'] = $JsonGCE->gce_project_id;
	$Vars['gce_sa_email'] = $JsonGCE->client_email;
	$Vars['url_etherpad'] = getenv("url_etherpad");
	$Vars['nome_projeto_openshift'] = "workshop-alunos";
	$Vars['nome_workshop'] = "workshop1";
	$Vars['url_wetty'] = "none";
	$Vars['url_ansible_tower'] = "none";
	
}

$cluster_openshift_env = getenv("CLUSTER_OPENSHIFT");
if($cluster_openshift_env != "" and !isset($Vars['salvo'])) {
	$Vars['cluster_openshift'] = $cluster_openshift_env;
}

$token_openshift_env = getenv("TOKEN_OPENSHIFT");
if($token_openshift_env != "" and !isset($Vars['salvo'])) {
	$Vars['token_openshift'] = $token_openshift_env;
	$token_openshift = $token_openshift_env;
} else {
	$token_openshift = $Vars['token_openshift'];
}

$conteudo_json_env = file_get_contents("/etc/ansible/workshop-stuff/conteudo_gce_json.json");
if($conteudo_json_env != "" and !isset($Vars['salvo'])) {
	$conteudo_gce_json = $conteudo_json_env;
}

$conteudo_chavessh_env = file_get_contents("/etc/ansible/workshop-stuff/ssh_private_key");
if($conteudo_chavessh_env != "" and !isset($Vars['salvo'])) {
        $conteudo_ssh_private_key = $conteudo_chavessh_env;
}

$wetty_url_env = getenv("WETTY_URL");
if($wetty_url_env != "" and !isset($Vars['salvo'])) {
	$Vars['url_wetty'] = $wetty_url_env;
}


// Carrega do DB
$InstructorDb = new Instructor;
$InstructorDb->ObtemConfiguracoesDb();

if($InstructorDb->project_id == "") {
  $InstructorDb->project_id =  $JsonGCE->gce_project_id;
}
if($InstructorDb->gce_sa_email == "") {
  $InstructorDb->gce_sa_email =  $JsonGCE->gce_sa_email;
}
if($InstructorDb->cluster_openshift == "") {
  $InstructorDb->cluster_openshift = 	$Vars['cluster_openshift'];
}

if($InstructorDb->gce_json == "") {
  $InstructorDb->gce_json = $conteudo_gce_json;
}

if($InstructorDb->ssh_private_key == "") {
  $InstructorDb->ssh_private_key = $conteudo_ssh_private_key;
}
if($InstructorDb->token_openshift == "") {
  $InstructorDb->token_openshift = 	$Vars['token_openshift'];
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">GCE Service Account email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="gce_sa_email" id="gce_sa_email"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->gce_sa_email;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">GCE Project ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="gce_project_id" name="gce_project_id"  class="form-control col-md-7 col-xs-12"  value="<?php echo $InstructorDb->gce_project_id;?>">
                        </div>
                      </div>
                      <div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">GCE Json<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="gce_json" name="gce_json"  class="form-control" name="message" rows="10"><?php echo $InstructorDb->gce_json;?></textarea>
			</div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS Access Key <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_access_key" id="aws_access_key"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_access_key;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS Key Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_key_name" id="aws_key_name"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_key_name;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS Secret Key <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_secret_key" id="aws_secret_key"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_secret_key;?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS Security Group <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_security_group" id="aws_security_group"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_security_group;?>">
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS Subnet ID <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_subnet_id" id="aws_subnet_id"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_subnet_id;?>">
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">AWS VPC Network <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="aws_vpc_network" id="aws_vpc_network"  class="form-control col-md-7 col-xs-12" value="<?php echo $InstructorDb->aws_vpc_network;?>">
                        </div>
                      </div>  
	 		<div class="form-group">

                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">SSH GCE <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="ssh_private_key" name="ssh_private_key" required="required" class="form-control" name="message" rows="10"><?php echo $InstructorDb->ssh_private_key;?></textarea>
			</div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Usuario SSH (GCE) <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="ssh_user" name="ssh_user" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->ssh_user;?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Cluster Openshift<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="cluster_openshift" name="cluster_openshift" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->cluster_openshift;?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Projeto Openshift<span class="required">*</span>
                        </label>
                        <?php
                        if($InstructorDb->nome_projeto_openshift == "") {
                          $InstructorDb->nome_projeto_openshift = "workshop-alunos";
                        }
                        ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nome_projeto_openshift" name="nome_projeto_openshift" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->nome_projeto_openshift;?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Token Openshift<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
			 <textarea id="token_openshift" name="token_openshift" required="required" class="form-control" name="message" rows="4"><?php echo $InstructorDb->token_openshift;?></textarea>
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Remetente<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email_remetente" name="email_remetente" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->email_remetente;?>">
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha Email<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="senha_email" name="senha_email" class="date-picker form-control col-md-7 col-xs-12" required="required" type="password"  value="<?php echo $InstructorDb->senha_email;?>">
                        </div>
                      </div>


                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome Workshop<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="nome_workshop" name="nome_workshop" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->nome_workshop;?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Endereco Ansible Tower<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url_ansible_tower" name="url_ansible_tower" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->url_ansible_tower;?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Url Wetty<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url_wetty" name="url_wetty" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->url_wetty;?>">
                        </div>
                      </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Url Etherpad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="url_etherpad" name="url_etherpad" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->url_etherpad;?>">
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Link Formulario Feedback<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="link_formulario_feedback" name="link_formulario_feedback" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text"  value="<?php echo $InstructorDb->link_formulario_feedback;?>">
                        </div>
                      </div>

			<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecione o tipo do Workshop</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                         <select class="form-control" name="tipo_workshop">
			<?php
      $Db2 = new Db;
        $qr = "select * from tipo_workshop";
        $rs = $Db2->m_query($qr);
        while($y=$Db2->m_fetch_array($rs)) {
            $id_tipo_workshop = $y['id_tipo_workshop'];
            $tipo_workshop = $y['tipo_workshop'];
				if($InstructorDb->id_tipo_workshop == $id_tipo_workshop) {
						$s = " selected";
					} else {
            $s = "";
          }
					
			?>
                          
                            <option value="<?php echo $id_tipo_workshop;?>" <?php echo $s;?>><?php echo $tipo_workshop;?></option>
                            <?php
        }
        $Db2->m_close();
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Selecione o Provider</label>
                         <div class="col-md-9 col-sm-9 col-xs-12">
                         <select class="form-control" name="provider">
			<?php
           
				if($InstructorDb->provider == "gce") {
            $gce = " selected";
            $aws = "";
					} else {
            $aws = " selected";
            $gce = "";
          }
					
			?>
                          
                            <option value="gce" <?php echo $gce;?>>GCE</option>
                            <option value="aws" <?php echo $aws;?>>AWS</option>
                           </select>
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
