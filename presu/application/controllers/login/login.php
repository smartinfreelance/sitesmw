<?php

class Login extends CI_Controller
{
    function Login()
    {
        parent::__construct();
        $this->load->model('loginCRUD');
        $this->load->model('presupuestosCRUD');
        $this->load->model('usuariosCRUD');
    }

    function index()
    {
        $this->load->view(
            'login/login'
        );
    }
    function intenta_loggear($pagina_nro=0)
    {
        $this->form_validation->set_rules('usuario','usuario','required|callback_existe_en_bbdd');
        $this->form_validation->set_rules('pass','password','required');

        if ($this->form_validation->run() == FALSE){
            $this->index();

        }else{
            $usuario = array();
            if(isset($_POST['usuario'])) $usuario = $this->loginCRUD->intentaLoggear($_POST['usuario'],$_POST['pass']);
            if(count($usuario) > 0){
                $datos=array("idusuario_presu"=> $usuario[0]->id,"nombre"=> $usuario[0]->nombre,"usuario"=> $usuario[0]->usuario,"rol"=> $usuario[0]->id_rol);
                $this->session->set_userdata($datos);
                $cant_rows = 10;
                $controller = "presupuestos";
                $total_rows = $this->presupuestosCRUD->getCantPresupuestos();

                $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

                $desde_row = $pagina_nro * $cant_rows;
                $presupuestos = $this->presupuestosCRUD->getXPresupuestos($desde_row,$cant_rows);
                $this->load->view("main", array(
                                            "modulo"=> "presupuestos", 
                                            "pagina"=> "principal",
                                            "presupuestos" => $presupuestos,
                                            "links" => $linksPaginacion
                                            )
                                );
            }else{
                $this->load->view('login/login');
            }
        }
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario_inmo"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        $usuario = $this->usuariosCRUD->existeNombre($str);
        if(count($usuario) > 0){
            return TRUE;
        }else{                
            $this->form_validation->set_message('existe_en_bbdd', 'No hay registro de un %s :"'.$str.'".');
            return FALSE;
        }
    }
    
}