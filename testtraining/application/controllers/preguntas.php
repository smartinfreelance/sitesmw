<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Preguntas extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('preguntascrud');
        $this->load->model('topicscrud');
        $this->load->model('logincrud');
    }

	public function index()
	{

		if($this->session->userdata('idusuario_tt')){
			$all_topics = $this->topicscrud->getAllTopics();
			$this->load->view('main', 
								array(
									"modulo" => 'menu',
									"pagina" => 'panel',
									"topics" => $all_topics
									));
		}else{
			$this->load->view('login');
		}

	}

	public function modoLectura($id=0)
	{
		if($this->session->userdata('idusuario_tt')){
			$preguntas = $this->preguntascrud->getAllPreguntasByTopic($id);
			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'lectura',
									"preguntas" => $preguntas
									));
		}else{
			$this->load->view('login');
		}
	}

	public function modoSimulador($id=0){
		if($this->session->userdata('idusuario_tt')){
			$preguntas = $this->preguntascrud->getPreguntasByTopic($id);
			$filtro = "";
			foreach($preguntas as $p){
				if($filtro == ""){
					$filtro = " and respuestas.id_pregunta in (".$p->id;
				}else{
					$filtro = $filtro.", ".$p->id;
				}
			}

			$filtro = $filtro.") ";
			$respuestas = $this->preguntascrud->getAllRespuestas($filtro);

			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'simulador',
									"preguntas" => $preguntas,
									"respuestas" => $respuestas,
									"id_topic" => $id
									));
		}else{
			$this->load->view('login');
		}
	}
	function finalizarSimulador($id=0){
		if($this->session->userdata('idusuario_tt')){
			$this->logincrud->setLog($this->session->userdata('idusuario_tt'),'Finaliza MSimulador');
			$correctas = 0;
			$c = 0;
			$total = 0;
			$pregResCorr = array();
			$pregResIncorr = array();
			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}

			$cant_preguntas = $this->preguntascrud->getCantPreguntasByTopic($id_topic);

			for($i = 1 ; $i <= $cant_preguntas ; $i++){
				$total++;
				$pregres = $_POST["pregunta".$i];
				$pyr = explode("-", $pregres);
				$c = $this->preguntascrud->comprobarRespuesta($pyr[0],$pyr[1]);
				$correctas = $correctas + $c;
				if($c == 1){
					$pregResCorr[] = $this->preguntascrud->getPregResCorr($pyr[0],$pyr[1]);
				}else{
					$pregResIncorr[] = $this->preguntascrud->getPregResIncorr($pyr[0],$pyr[1]);
				}
			}
			$this->imprimirResultado($total,$correctas,$id_topic,"modoSimulador",$pregResCorr, $pregResIncorr);
		}else{
			$this->load->view('login');
		}
	}	

	public function unaPregunta($id=0)
	{
		if($this->session->userdata('idusuario_tt')){
			
			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}

			if(isset($_POST["id_pregunta"])){
				$id_pregunta = $_POST['id_pregunta'];
			}else{
				$id_pregunta = "";
			}

			if(isset($_POST["filtro"])){
				$filtro = $_POST['filtro'];
			}else{
				$filtro = "";
			}

			if(isset($_POST["correctas"])){
				$correctas = $_POST["correctas"];
			}else{
				$correctas = "0";
			}

			if(isset($_POST["total"])){
				$total = $_POST["total"] + 1;
			}else{
				$total = "1";
			}

			$filtro_edited = "";
			if($filtro!=""){
				$filtro_edited = str_replace("-",",",$filtro);
				$filtro_edited = "and preguntas.id not in (".$filtro_edited.") ";

			}

			if(isset($_POST['id_respuesta'])){
				$resultado = $this->preguntascrud->comprobarRespuesta($id_pregunta,$_POST['id_respuesta']);
				$correctas = $correctas + $resultado;
			}

			$filtro_edited = $filtro_edited." and preguntas.id_topic = ".$id_topic;
			
			$pregunta = $this->preguntascrud->getPregunta($filtro_edited);

			if(!empty($pregunta)){
				$respuestas = $this->preguntascrud->getRespuestasById($pregunta[0]->id);

				if($filtro == ""){
					$filtro = $pregunta[0]->id;
				}else{
					$filtro = $filtro."-".$pregunta[0]->id;
				}	
				$this->load->view('main', 
									array(
										"modulo" => 'preguntas',
										"pagina" => 'individual',
										"pregunta" => $pregunta[0],
										"respuestas" => $respuestas,
										"filtro" => $filtro,
										"total" => $total,
										"correctas" => $correctas,
										"id_topic" => $id_topic
										));
			}else{
				$this->imprimirResultado($total-1,$correctas,$id_topic,"unaPregunta");
			}
		}else{
			$this->load->view('login');
		}
	}

	function finalizarPreguntados($id=0){
		/*if(isset($_POST["id_pregunta_f"])){
			$id_pregunta = $_POST['id_pregunta_f'];
		}else{
			$id_pregunta = "";
		}

		if(isset($_POST["filtro_f"])){
			$filtro = $_POST['filtro_f'];
		}else{
			$filtro = "";
		}*/
		if($this->session->userdata('idusuario_tt')){
			if(isset($_POST["id_topic"])){
				$id_topic = $_POST["id_topic"];
			}else{
				$id_topic = $id;
			}
			if(isset($_POST["correctas_f"])){
				$correctas = $_POST["correctas_f"];
			}else{
				$correctas = "0";
			}

			if(isset($_POST["total_f"])){
				$total = $_POST["total_f"]-1;
			}else{
				$total = "1";
			}

			$this->imprimirResultado($total,$correctas,$id_topic,"unaPregunta");
		}else{
			$this->load->view('login');
		}

	}

	function imprimirResultado($total,$correctas,$id_topic,$modo,$pregResCorr = array(), $pregResIncorr = array()){
		if($this->session->userdata('idusuario_tt')){
			if($total != 0){
				$porcentaje = round(($correctas * 100)/$total ,2);
			}else{
				$porcentaje = round(0 ,2);
			}
			$this->logincrud->setLog($this->session->userdata('idusuario_tt'),'Finaliza MPreguntados'.$porcentaje);

			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'resultado',
									"total" => $total,
									"correctas" => $correctas,
									"porcentaje" => $porcentaje,
									"modo" => $modo,
									"pregCorr" => $pregResCorr,
									"pregIncorr" => $pregResIncorr,
									"id_topic" => $id_topic
									));
		}else{
			$this->load->view('login');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */