<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('preguntascrud');
    }

	public function index()
	{

		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'menu',
									"pagina" => 'panel'
									));
		}else{
			$this->load->view('login');
		}

	}

	public function setNewCourse()
	{
		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'add'
									));
		}else{
			$this->load->view('login');
		}
	}

	public function confirmAddTopic(){
		if($this->session->userdata('idusuario_tt')){

			$id_topic = $this->topicscrudd->add_topic($_POST['nombre'],$_POST['descripcion']);

			for($i = 1; $i<=10; $i++){
				$sub_p = "preg".$i;
				$id_pregunta = $this->topicscrudd->add_pregunta($id_topic, $_POST[$sub_p]);
				for($j = 1; $j<=4; $j++){
					$sub_r_radio = "resp".$i;
					$sub_r_text = "respuesta".$i."-".$j;
					if($_POST[$sub_r] == $j){
						$this->topicscrudd->add_respuesta($id_pregunta,$_POST[$sub_r_text],1);
					}else{
						$this->topicscrudd->add_respuesta($id_pregunta,$_POST[$sub_r_text],0);
					}
				}
			}

			$this->load->view('main', 
								array(
									"modulo" => 'usuario',
									"pagina" => 'cuenta'
									));
		}else{
			$this->load->view('login');
		}

	}

	public function modoSimulador(){
		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'menu',
									"pagina" => 'panel'
									));
		}else{
			$this->load->view('login');
		}
	}

	public function unaPregunta()
	{
		if($this->session->userdata('idusuario_tt')){
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

				$id_respuesta = $_POST['id_respuesta'];
				$resultado = $this->preguntascrud->comprobarRespuesta($id_pregunta,$id_respuesta);
				$correctas = $correctas + $resultado;
			}
			
			$pregunta = $this->preguntascrud->getPregunta($filtro_edited);

			if($pregunta[0]){
				$respuestas = $this->preguntascrud->getRespuestasById($pregunta[0]->id);

				if($id_pregunta!=""){
					if($filtro!=""){
						$filtro = $id_pregunta."-".$filtro;
					}else{
						$filtro = $id_pregunta;
					}
					
				}		
				$this->load->view('main', 
									array(
										"modulo" => 'preguntas',
										"pagina" => 'individual',
										"pregunta" => $pregunta[0],
										"respuestas" => $respuestas,
										"filtro" => $filtro,
										"total" => $total,
										"correctas" => $correctas
										));
			}else{
				$this->imprimirResultado($total,$correctas);
			}
		}else{
			$this->load->view('login');
		}
	}

	function finalizarPreguntados(){
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

			$this->imprimirResultado($total,$correctas);
		}else{
			$this->load->view('login');
		}

	}

	function imprimirResultado($total,$correctas){
		if($this->session->userdata('idusuario_tt')){
			if($total != 0){
				$porcentaje = round(($correctas * 100)/$total ,2);
			}else{
				$porcentaje = round(0 ,2);
			}
			

			$this->load->view('main', 
								array(
									"modulo" => 'preguntas',
									"pagina" => 'resultado',
									"total" => $total,
									"correctas" => $correctas,
									"porcentaje" => $porcentaje
									));
		}else{
			$this->load->view('login');
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */