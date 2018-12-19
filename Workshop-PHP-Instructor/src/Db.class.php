<?php
// Registering Globals
$dbhost = getenv("DBHOST");
if($dbhost == "") {
	$dbhost = "mysql";
}
define("dbhost", $dbhost);
define("dbuser", "admin");
define("dbpass", "redhat@123");
define("dbname", "workshop");
// 
class Db {
	public $hostname =  dbhost;
	public $usuario = dbuser;
	public $senha = dbpass;
	public $database = dbname;
	
	
	public $idcon;
	public $rs;
	public $matriz_associativa;
	
	public function Db(){
		$this->m_connect();	
	}
	
	public function m_connect() {
			$this->idcon = mysql_pconnect($this->hostname, $this->usuario, $this->senha) or die(mysql_error());
			mysql_select_db($this->database, $this->idcon);
			// Set timezone
			$qr = "set time_zone = 'America/Sao_Paulo'";
			$this->m_query($qr);
	}
	
	public function m_query($qr) {
			if(!$this->idcon) {
				$this->m_connect();
			}
                        
			$rs=mysql_query($qr, $this->idcon);
			$this->rs = $rs;
			return $rs;
			
	}
	
	public function m_fetch_array($rs) {
		return mysql_fetch_array($rs);
	}

	public function m_result($rs, $campo) {
		return mysql_result($rs, 0, $campo);
	}

	public function SetPassword($password) {
			$this->senha = $password;
	}

	public function m_num_rows($rs) {
		return mysql_num_rows($rs);
	}

	public function m_affected_rows() {
		return mysql_affected_rows($this->idcon);
	}

	public function m_close() {
		return mysql_close($this->idcon);	
	}
	
	public function m_error() {
		return mysql_error();	
	}
        
        public function escape($string) {
            return mysql_real_escape_string($string, $this->idcon);
        }

	// ======================= Funcoes Especificas para Instructor ================

	public function CreateSchema() {

		// ========= Tabela Student para armazenar dados dos alunos
		$qr = "
create table if not exists student ( 
	id_student int primary key auto_increment not null,
	nome varchar(255),
	dthr_registro datetime,
	id_area int,
	email varchar(255),
	empresa varchar(255),
        cmd_aluno text,
        status_ansible text,
        pid_ansible varchar(255)
)
";
		$rs = $this->m_query($qr);

		// ========= Tabela Tasks para definir as tarefas dos alunos
                $qr = "
create table if not exists tasks ( 
        id_task int primary key auto_increment not null,
        task varchar(255),
	ansible_playbook_status varchar(255),
	ansible_playbook_position varchar(255)
)
";
				$rs = $this->m_query($qr);
				
		// ========= Tabela para acompanhar o estado das tarefas dos alunos
                $qr = "
create table if not exists task_student ( 
        id_task_student int primary key auto_increment not null,
        id_task int,
        status varchar(1) default 'N'
)
";
                $rs = $this->m_query($qr);

		// ========= Tabela area que contem as areas (departamentos) dos alunos

		$qr = "create table if not exists area (
        id_area int primary key auto_increment not null,
        area varchar(255)
)
";
		$rs = $this->m_query($qr);
		
		// ========= Tabela de armazenamento das configuracoes do sistema
		$qr = "create table configuration (
id_configuration int primary key not null,
gce_sa_email varchar(255),
gce_project_id varchar(255),
gce_json text,
ssh_private_key text,
aws_access_key varchar(255),
aws_secret_key varchar(255),
aws_vpc_network varchar(255),
aws_subnet_id varchar(255),
aws_security_group varchar(255),
aws_key_name varchar(255),
ssh_user varchar(255),
cluster_openshift varchar(255),
nome_projeto_openshift varchar(255) default 'workshop-apoio',
token_openshift text,
email_remetente varchar(255),
senha_email varchar(255),
nome_workshop varchar(255),
url_ansible_tower varchar(255),
url_wetty varchar(255),
url_etherpad varchar(255),
provider varchar(20),
link_formulario_feedback varchar(255),
id_tipo_workshop int
);";

	$rs = $this->m_query($qr);

	// ========= Tabela Tipo do Workshop

	$qr = "create table tipo_workshop ( id_tipo_workshop int primary key not null, tipo_workshop varchar(255))";

	$rs = $this->m_query($qr);



	}
	public function PopulateAreas() {
		// Sincroniza areas
		$qr = "delete from area";
		$rs = $this->m_query($qr);
		$qr = "insert into area (id_area, area) values ('1', 'Arquitetura'), ('2','Infraestrutura'), ('3', 'Desenvolvimento'), ('4', 'Gestao'), ('5', 'DevOps')"; 
		$rs = $this->m_query($qr);

		// Sincroniza tipo workshop
		$qr = "delete from tipo_workshop";
		$rs = $this->m_query($qr);
		$qr = "insert into tipo_workshop (id_tipo_workshop, tipo_workshop) values ('1', 'Ansible'), ('2','Openshift'), ('3', 'RHPDS')";
		$rs = $this->m_query($qr);
	}
	
}

