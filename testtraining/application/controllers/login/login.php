<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::__construct();
        $this->load->model('loginCRUD');
    }

    function index()
    {
        if($this->session->userdata('idusuario')){
            $this->load->view('main', 
                                array(
                                    "modulo" => 'menu',
                                    "pagina" => 'panel'
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
                        "idusuario_tt"=> $usuario[0]->id,
                        "nombre"=> $usuario[0]->nombre,
                        "apellido"=> $usuario[0]->apellido,
                        "mail"=> $usuario[0]->mail,
                        "fecha_nac"=> $fecha_nac,
                        "usuario"=> $usuario[0]->usuario,
                        "rol"=> $usuario[0]->id_rol
                    );
            $this->session->set_userdata($datos);
            
            $this->load->view(
                'main', 
                array(
                    "modulo" => 'menu',
                    "pagina" => 'panel'
                )
            );
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