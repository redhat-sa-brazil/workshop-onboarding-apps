<?php
        require_once "config.php";
        require_once "httpful.phar";
        class Question {
             public $id_pergunta;
             public $pergunta;
             public $Mopcoes;
                public $description;
                public $options;
                public function BuscaPerguntaPorId($id_pergunta) {
                $endpoint = "http://questions-answers.workshop-apoio.svc.cluster.local:8080/rest/question/$id_pergunta";
                 $response = \Httpful\Request::get($endpoint)                  // Build a PUT request...
    ->sendsJson()                               // tell it we're sending (Content-Type) JSON...
    ->body('{"json":"is awesome"}')             // attach a body/payload...
    ->send();
                return json_decode($response);
                }
             
             public function CadastraPergunta($pergunta, $Mopcoes) {
                $endpoint = "http://questions-answers.workshop-apoio.svc.cluster.local:8080/rest/question";
                $method = "POST";
                $Objeto = new stdClass();
                $Objeto->description = $pergunta;
                $MOpcoes = array();
                $cont=0;
                for($y=0;$y<sizeof($Mopcoes);$y++) {
                        $Opcao = new stdClass();
                        $Opcao->description = $Mopcoes[$y];
                        $MOpcoes[$cont++] = $Opcao;
                }
                $Objeto->options = $MOpcoes;
                $Jsonobj = json_encode($Objeto);
               // print_r($Jsonobj);
$response = \Httpful\Request::post($endpoint)                  // Build a PUT request...
    ->sendsJson()                               // tell it we're sending (Content-Type) JSON...
    ->body($Jsonobj)             // attach a body/payload...
    ->send(); 

                 //echo "Pergunta: $pergunta<br>";
                 //print_r($Mopcoes);
             }
             
             public function BuscaPerguntas() {
                $endpoint = "http://questions-answers.workshop-apoio.svc.cluster.local:8080/rest/question";
                $method = "GET";
                $json = \Httpful\Request::get($endpoint)->send();
                 $ObjetoJson = json_decode($json);
                 $MatrizPerguntas = $ObjetoJson->_embedded->question;
                 $MatrizFinal = array();
                 $cont=0;
                 //print_r($MatrizPerguntas);
                 for($x=0;$x<sizeof($MatrizPerguntas);$x++) {
                     $Objeto = $MatrizPerguntas[$x];
                     $MatrizFinal[$cont]['id_pergunta'] = $Objeto->id;
                     $MatrizFinal[$cont]['pergunta'] = $Objeto->description;
                     $MatrizFinal[$cont++]['Mopcoes'] = json_decode($Objeto->options, true);
                 }
                // print_r($MatrizFinal);
                 return $MatrizFinal;
                 
                 
             }
             
             public function AlteraPergunta($id_pergunta, $pergunta, $Mopcoes) {
                $endpoint = "http://questions-answers.workshop-apoio.svc.cluster.local:8080/rest/question/$id_pergunta";
                $method = "PUT";
                $Objeto = new stdClass();
                $Objeto->description = $pergunta;
                $MOpcoes = array();
                $cont=0;
                for($y=0;$y<sizeof($Mopcoes);$y++) {
                        $Opcao = new stdClass();
                        $Opcao->description = $Mopcoes[$y];
                        $MOpcoes[$cont++] = $Opcao;
                }
                $Objeto->options = $MOpcoes;
                $Jsonobj = json_encode($Objeto);
               // print_r($Jsonobj);
$response = \Httpful\Request::put($endpoint)                  // Build a PUT request...
    ->sendsJson()                               // tell it we're sending (Content-Type) JSON...
    ->body($Jsonobj)             // attach a body/payload...
    ->send(); 
             }
             
             public function DeletaPergunta($id_pergunta) {
               $endpoint = "http://questions-answers.workshop-apoio.svc.cluster.local:8080/rest/question/$id_pergunta";
                 $response = \Httpful\Request::delete($endpoint)                  // Build a PUT request...
    ->sendsJson()                               // tell it we're sending (Content-Type) JSON...
    ->body('{"json":"is awesome"}')             // attach a body/payload...
    ->send(); 
             }
        }
?>