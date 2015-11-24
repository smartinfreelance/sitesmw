<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::__construct();
        $this->load->model('loginCRUD');
        $this->load->model('topicscrud');
    }

    function index()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        if($this->session->userdata('idusuario_tt')){
            $all_topics = $this->topicscrud->getAllTopics();

            $li_content = array();
            $cant_vidas_default = 0;

            if($usuario[0]->id_rol == 1){
                $cant_vidas_default = 100;
            }if($usuario[0]->id_rol == 2){
                $cant_vidas_default = 100;
            }if($usuario[0]->id_rol == 3){
                $cant_vidas_default = 3;
            }else{
                $cant_vidas_default = 100;
            }

            foreach($all_topics as $at){
                $vidas_mp = 0;              
                $vidas_ms = 0;
                $cant_jug_mp = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
                $cant_jug_ms = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));

                $vidas_mp = $cant_vidas_default - $cant_jug_mp;
                $vidas_ms = $cant_vidas_default - $cant_jug_ms;
                $ml = $vidas_ms + $vidas_mp;

                if($ml>0){
                    $ver_ml = false;
                }else{
                    $ver_ml = true;
                }


                $li_content[] = array("id_topic" => $at->id, "vidas_mp" => $vidas_mp, "vidas_ms" => $vidas_ms, "ver_ml" => $ver_ml);
            }
            
            $this->load->view('main', 
                                array(
                                    "modulo" => 'menu',
                                    "pagina" => 'panel',
                                    "topics" => $all_topics,
                                    "li_content" => $li_content
                                    ));
        }else{
            $this->load->view('login');
        }

    }
    function intenta_loggear()
    {
        $usuario = array();
        if(isset($_POST['usuario'])){
            $usuario = $this->loginCRUD->intentaLoggear($_POST['usuario'],$_POST['pass']);  
        } 
        if(count($usuario) > 0){
            $fecha_nac = $this->pasarFechaADDMMAAAA($usuario[0]->fecha_nac); // Proviene de AAAA-MM-DD
            $datos = array(
                        "idusuario_tt" => $usuario[0]->id,
                        "nombre" => $usuario[0]->nombre,
                        "apellido" => $usuario[0]->apellido,
                        "mail" => $usuario[0]->mail,
                        "fecha_nac" => $fecha_nac,
                        "usuario" => $usuario[0]->usuario,
                        "rol" => $usuario[0]->id_rol
                    );
            $this->session->set_userdata($datos);
            
            $all_topics = $this->topicscrud->getAllTopics();

            $li_content = array();

            $cant_vidas_default = 0;

            if($usuario[0]->id_rol == 1){
                $cant_vidas_default = 100;
            }if($usuario[0]->id_rol == 2){
                $cant_vidas_default = 100;
            }if($usuario[0]->id_rol == 3){
                $cant_vidas_default = 3;
            }else{
                $cant_vidas_default = 100;
            }

            foreach($all_topics as $at){
                $vidas_mp = 0;              
                $vidas_ms = 0;

                $cant_jug_mp = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 1 ,date("Y-m-d"));
                $cant_jug_ms = $this->topicscrud->getCantTries($at->id, $this->session->userdata('idusuario_tt'), 2 ,date("Y-m-d"));

                $vidas_mp = $cant_vidas_default - $cant_jug_mp;
                $vidas_ms = $cant_vidas_default - $cant_jug_ms;
                $ml = $vidas_ms + $vidas_mp;

                if($ml>0){
                    $ver_ml = false;
                }else{
                    $ver_ml = true;
                }


                $li_content[] = array("id_topic" => $at->id, "vidas_mp" => $vidas_mp, "vidas_ms" => $vidas_ms, "ver_ml" => $ver_ml);
            }
            
            $this->load->view('main', 
                                array(
                                    "modulo" => 'menu',
                                    "pagina" => 'panel',
                                    "topics" => $all_topics,
                                    "li_content" => $li_content
                                    ));
        }else{
           $this->load->view('login');
        }
    }

    function pasarFechaADDMMAAAA($fechaAAAAMMDD){

        list($anio,$mes,$dia) = explode("-",$fechaAAAAMMDD);

        $fechaDDMMAAAA = $dia."-".$mes."-".$anio;

        return $fechaDDMMAAAA;
    }


    function intenta_desloggear()
    {
        $datos=array("idusuario_tt"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }
    
}