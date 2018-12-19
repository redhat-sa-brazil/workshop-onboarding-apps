<?php
        require_once "config.php";
        require_once "Student.class.php";
	class Instructor {
         public $gce_sa_email;
	public $gce_project_id;
	public $gce_json;
	public $ssh_private_key;
	public $aws_access_key;
	public $aws_secret_key;
	public $aws_vpc_network;
	public $aws_subnet_id;
	public $aws_security_group;
	public $aws_key_name;
	public $ssh_user;
	public $cluster_openshift;
	public $nome_projeto_openshift;
	public $token_openshift;
	public $email_remetente;
	public $senha_email;
	public $nome_workshop;
	public $url_ansible_tower;
	public $url_wetty;
	public $url_etherpad;
	public $link_formulario_feedback;
        public $id_tipo_workshop;
        public $provider;
        public $Student;
        public $project_id;
        public $url_tower;
        
 
                //public $email_remetente;
                
		public function ObtemAreas () {
			$Db = new Db;
			$qr = "select * from area";
			$rs = $Db->m_query($qr);
			$Mareas = array();
			$cont=0;
			while($x=$Db->m_fetch_array($rs)) {
				$Mareas[$cont]['id_area'] = $x['id_area'];
				$Mareas[$cont++]['area'] = $x['area'];
			}
			$Db->m_close();
			return $Mareas;
		}

		public function CadastraAluno($Student) {
			$Db = new Db;
			$nome = $Student->nome;
			$empresa = $Student->empresa;
			$id_area = $Student->id_area;
			$email = $Student->email;
			$qr = "insert into student set nome = '$nome', id_area = '$id_area', empresa = '$empresa', email = '$email', dthr_registro = now()";
                        $rs = $Db->m_query($qr);
                        $qrid = "select id_student from student where nome = '$nome' and id_area = '$id_area' and empresa = '$empresa' and email = '$email' order by id_student desc limit 1";
                        $rsid = $Db->m_query($qrid);
                        $Student->id_student = $Db->m_result($rs, 'id_student');
                        $this->Student = $Student;
			$Db->m_close();
		}

		public function VerificaSeAlunoJaExiste($Student) {
			$Db = new Db;
			$email = $Student->email;
			$qr = "select id_student from student where email = '$email'";
			$rs = $Db->m_query($qr);
			if($Db->m_num_rows($rs) > 0) {
				$Db->m_close();
				return true;
			} else {
				$Db->m_close();
				return false;
			}
		}

		public function VerificaTotalAlunos() {
 			$Db = new Db;
                        $email = $Student->email;
                        $qr = "select count(id_student) as contagem from student";
                        $rs = $Db->m_query($qr);
			return $Db->m_result($rs, 'contagem');
		}
                
                public function EnviaEmailFinalAluno($id_student) {
 			$Db = new Db;
                        $qr = "select email from student where id_student = '$id_student'";
                        $rs = $Db->m_query($qr);
			$email = $Db->m_result($rs, 'email');
                        $this->ObtemConfiguracoes();
                        
                        
                         $this->EnviaEmailFinalAnsible($email);
                        
                      
                        
		}
                
                 public function EnviaEmailFinalTodosAlunos() {
 			$Db = new Db;
                        $qr = "select email from student";
                        $rs = $Db->m_query($qr);
                        $this->ObtemConfiguracoes();
                        while($x=$Db->m_fetch_array($rs)) {
                            $email = $x['email'];
                            $this->EnviaEmailFinalAnsible($email);
                        }
                        
		}
                
                public function ObtemConfiguracoes() { 
                    
                    // =================================
                    // Variaveis de arquivo
                    // =================================
                    $config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
                    $config_yaml_pv = "/workshop-pv/config.yml";
                    $arquivo_json = "/etc/ansible/playbooks/gce.json";
                    $arquivo_json_pv = "/workshop-pv/gce.json";
                    $chave_ssh = "/etc/ansible/playbooks/ssh_gce";
                    $chave_ssh_pv = "/workshop-pv/ssh_gce";
                    
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
                    if(file_exists($chave_ssh_pv)) {
                            $conteudo_chave_ssh = file_get_contents("$chave_ssh_pv");
                    } else {
                            $conteudo_chave_ssh = file_get_contents("$chave_ssh");
                    }
                    if(file_exists($arquivo_json_pv)) {
                            $conteudo_json_gce = file_get_contents("$arquivo_json_pv");
                    } else {
                            $conteudo_json_gce = file_get_contents("$arquivo_json");
                    }

                    if(file_exists($arquivo_json_pv)) {
                            $JsonGCE = json_decode(file_get_contents("$arquivo_json_pv"));
                    } else { 
                            $JsonGCE = json_decode(file_get_contents("/etc/ansible/workshop-stuff/conteudo_json_gce.json"));
                    }
                    
                    $this->email_remetente = $Vars['email_remetente'];

                }
                
                public function EnviaEmailFinalAnsible($email_aluno) {
                    /*
                    if(intval($Vars['tipo_workshop']) == "1") {
                        $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_openshift.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
                    }
                    if(intval($Vars['tipo_workshop']) == "2") {
                        $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_student_instance_ansible.yml -e \"nome_aluno=$nome_aluno user=$user email_aluno=$email_aluno\"";
                    }
                     * 
                     */
                    $comando = "ansible-playbook /etc/ansible/playbooks/workshop-onboarding/instructor_email.yml -e \"email_aluno=$email_aluno\"";
                    $rand = rand();
                    $outputfile = "/tmp/$rand-log.txt";
                    $pidfile = "/tmp/$rand-pid.txt";
                    $commandfile = "/tmp/$rand-cmd.txt";
                    exec(sprintf("%s > %s 2>&1 & echo $! >> %s", $comando, $outputfile, $pidfile));
                }

		public function SalvaConfigDb() {
                        $Db = new Db;
                        $qr = "select id_configuration from configuration";
                        $rs = $Db->m_query($qr);
                        if($Db->m_num_rows($rs) > 0) {
                                $id_configuration = $Db->m_result($rs, 'id_configuration');
                                $qr = "update configuration set
                                gce_sa_email = '$this->gce_sa_email',
                                provider = '$this->provider',
gce_project_id = '$this->gce_project_id',
gce_json = '$this->gce_json',
ssh_private_key = '$this->ssh_private_key',
aws_access_key = '$this->aws_access_key',
aws_secret_key = '$this->aws_secret_key',
aws_vpc_network = '$this->aws_vpc_network',
aws_subnet_id = '$this->aws_subnet_id',
aws_security_group = '$this->aws_security_group',
aws_key_name = '$this->aws_key_name',
ssh_user = '$this->ssh_user',
cluster_openshift = '$this->cluster_openshift',
nome_projeto_openshift = '$this->nome_projeto_openshift',
token_openshift = '$this->token_openshift',
email_remetente = '$this->email_remetente',
senha_email = '$this->senha_email',
nome_workshop = '$this->nome_workshop',
url_ansible_tower = '$this->url_ansible_tower',
url_wetty = '$this->url_wetty',
url_etherpad = '$this->url_etherpad',
link_formulario_feedback = '$this->link_formulario_feedback',
id_tipo_workshop = '$this->id_tipo_workshop' where id_configuration = '$id_configuration'
                                
                                ";
                        } else {
                                $qr = "insert into configuration set
                                gce_sa_email = '$this->gce_sa_email',
                                provider = '$this->provider',
gce_project_id = '$this->gce_project_id',
gce_json = '$this->gce_json',
ssh_private_key = '$this->ssh_private_key',
aws_access_key = '$this->aws_access_key',
aws_secret_key = '$this->aws_secret_key',
aws_vpc_network = '$this->aws_vpc_network',
aws_subnet_id = '$this->aws_subnet_id',
aws_security_group = '$this->aws_security_group',
aws_key_name = '$this->aws_key_name',
ssh_user = '$this->ssh_user',
cluster_openshift = '$this->cluster_openshift',
nome_projeto_openshift = '$this->nome_projeto_openshift',
token_openshift = '$this->token_openshift',
email_remetente = '$this->email_remetente',
senha_email = '$this->senha_email',
nome_workshop = '$this->nome_workshop',
url_ansible_tower = '$this->url_ansible_tower',
url_wetty = '$this->url_wetty',
url_etherpad = '$this->url_etherpad',
link_formulario_feedback = '$this->link_formulario_feedback',
id_tipo_workshop = '$this->id_tipo_workshop'";
                        }
                        $rs = $Db->m_query($qr);
                        //echo $qr;
                        $Db->m_close();
		}
                
        public function ObtemConfiguracoesDb() {
                $Db = new Db;
                $qr = "select * from configuration";
                $rs = $Db->m_query($qr);
                if($Db->m_num_rows($rs) > 0) {
                        while($x=$Db->m_fetch_array($rs)) {
                        $this->gce_project_id = $x['gce_project_id'];
  $this->gce_sa_email = $x['gce_sa_email'];
  $this->gce_json = $x['gce_json'];
  $this->provider = $x['provider'];
  $this->ssh_private_key = $x['ssh_private_key'];
  $this->aws_access_key = $x['aws_access_key'];
  $this->aws_secret_key = $x['aws_secret_key'];
  $this->aws_vpc_network = $x['aws_vpc_network'];
  $this->aws_subnet_id = $x['aws_subnet_id'];
  $this->aws_security_group = $x['aws_security_group'];
  $this->aws_key_name = $x['aws_key_name'];
  $this->ssh_user = $x['ssh_user'];
  $this->cluster_openshift = $x['cluster_openshift'];
  $this->nome_projeto_openshift = $x['nome_projeto_openshift'];
  $this->token_openshift = $x['token_openshift'];
  $this->email_remetente = $x['email_remetente'];
  $this->senha_email = $x['senha_email'];
  $this->nome_workshop = $x['nome_workshop'];
  $this->url_ansible_tower = $x['url_ansible_tower'];
  $this->url_wetty = $x['url_wetty'];
  $this->url_etherpad = $x['url_etherpad'];
  $this->link_formulario_feedback = $x['link_formulario_feedback'];
  $this->id_tipo_workshop = $x['id_tipo_workshop'];
                        }
                }
        }

public function GeraConfigFiles() {
        $this->ObtemConfiguracoesDb();
        // =================================
        // Variaveis de arquivo
        // =================================
        $config_yaml = "/etc/ansible/playbooks/workshop-onboarding/config.yml";
        $config_yaml_pv = "/workshop-pv/config.yml";
        $arquivo_json = "/etc/ansible/playbooks/gce.json";
        $arquivo_json_pv = "/workshop-pv/gce.json";
        $ssh_private_key = "/etc/ansible/playbooks/ssh";
        $ssh_private_key_pv = "/workshop-pv/ssh";
        $rand_name = substr(md5(microtime()), 0, 10);

        // Gera conteudo json GCE
        $fp = fopen("$arquivo_json", "w+");
        fputs($fp, $this->gce_json);
        fclose($fp);

        // Gera conteudo chave ssh
        $fp = fopen($ssh_private_key, "w+");
        fputs($fp, $this->ssh_private_key);
        fclose($fp);

        // Gera config para ansible        
        $string_arquivo = "
        # ========================
# Configuracoes essenciais
# ========================
email_remetente: $this->email_remetente
nome_workshop: $this->nome_workshop
provider: $this->provider
chave_ssh: $ssh_private_key


# ========================
# Configuracoes GCE
# ========================
credentials_file: $arquivo_json
usuario_ssh_gce: $this->ssh_user

# ========================
# Configuracoes AWS
# ========================
aws_access_key: $this->aws_access_key
aws_secret_key: $this->aws_secret_key
aws_vpc_network: $this->aws_vpc_network
aws_subnet_id: $this->aws_subnet_id
aws_security_group: $this->aws_security_group
aws_key_name: $this->aws_key_name
usuario_ssh_aws: $this->ssh_user

id_instancia_aws: $rand_name

# ========================
# Configuracoes Opcionais
# ========================
project_id: $this->project_id
service_account_email: $this->gce_sa_email
cluster_openshift: $this->cluster_openshift
token_openshift: $this->token_openshift
nome_projeto_openshift: $this->nome_workshop
endereco_tower: $this->url_tower
url_wetty: $this->url_wetty
link_form_feedback: $this->link_formulario_feedback
        ";

        $fp = fopen($config_yaml, "w+");
        fputs($fp, $string_arquivo);
        fclose($fp);
}

	}
?>
