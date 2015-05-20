<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Topics extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('topicscrud');
        $this->load->model('usuariocrud');
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

			$id_topic = $this->topicscrud->add_topic($_POST['titulo'],$_POST['descripcion']);

			for($i = 1; $i<=10; $i++){
				$sub_p = "preg".$i;
				$id_pregunta = $this->topicscrud->add_pregunta($id_topic, $_POST[$sub_p]);
				for($j = 1; $j<=4; $j++){
					$sub_r_text = "respuesta".$i."-".$j;
					if($j == "1"){
						$this->topicscrud->add_respuesta($id_pregunta,$_POST[$sub_r_text],1);
					}else{
						$this->topicscrud->add_respuesta($id_pregunta,$_POST[$sub_r_text],0);
					}
				}
			}

			if($_POST['mas_preguntas']=="si"){
				$this->addPreguntaToTopic($id_topic,$_POST['titulo'],$_POST['descripcion']);
			}else{
				$this->verMiTest($id_topic);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function addPreguntaToTopic($id_topic = 0, $topic = "", $descripcion = ""){
		if($this->session->userdata('idusuario_tt')){
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'add_pregunta',
									"id_topic" => $id_topic,
									"topic" => $topic,
									"descripcion" => $descripcion
									));

		}else{
			$this->load->view('login');
		}


	}	

	public function confirmAddPreguntaToTopic(){
		if($this->session->userdata('idusuario_tt')){

			$id_topic = $_POST['id_topic'];
			
			$id_pregunta = $this->topicscrud->add_pregunta($id_topic, $_POST['pregunta']);
			for($j = 1; $j <= 4; $j++){
				$sub_r_text = "respuesta-".$j;
				if($j == "1"){
					$this->topicscrud->add_respuesta($id_pregunta,$_POST[$sub_r_text],1);
				}else{
					$this->topicscrud->add_respuesta($id_pregunta,$_POST[$sub_r_text],0);
				}
			}
			
			if($_POST['mas_preguntas']=="si"){
				$this->addPreguntaToTopic($id_topic,$_POST['topic'],$_POST['descripcion']);
			}else{
				$this->verMiTest($id_topic);
			}
		}else{
			$this->load->view('login');
		}

	}

	public function verMiTest($id_topic){
		if($this->session->userdata('idusuario_tt')){
			$preguntas = $this->preguntascrud->getAllPreguntasByTopic($id_topic);
			$this->load->view('main', 
								array(
									"modulo" => 'topics',
									"pagina" => 'verMiTest',
									"preguntas" => $preguntas
									));
		}else{
			$this->load->view('login');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */