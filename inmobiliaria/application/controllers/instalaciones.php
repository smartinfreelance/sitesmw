<?php

class Instalaciones extends CI_Controller
{
    function Instalaciones()
    {
        parent::__construct();
        $this->load->model('instalacionesCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "instalaciones";
            $total_rows = $this->instalacionesCRUD->getCantInstalaciones();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $instalaciones = $this->instalacionesCRUD->getXInstalaciones($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "instalaciones", 
                                        "pagina"=> "principal",
                                        "instalaciones" => $instalaciones,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getInstalacion($id_instalacion = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $instalacion = $this->instalacionesCRUD->getInstalacion($id_instalacion);
            if(count($instalacion) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "instalaciones", 
                                            "pagina"=> "ver_instalacion",
                                            "instalacion" => $instalacion[0]
                                            )
                                );
            }else{
                // No hay instalaciones con id = $id_instalacion
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchInstalacion($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $instalaciones = $this->instalacionesCRUD->getInstalacionesSearch($search);

            if(count($instalaciones) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "instalaciones", 
                                            "pagina"=> "resultado_busqueda",
                                            "instalaciones" => $instalaciones
                                            )
                                );
            }else{
                // No hay instalaciones con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "instalaciones", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }
    }

    function envioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            //PARA EL ENVIO DE MAILS INICIO
            $this->load->library('email');

            $this->email->from($datos_remitente[0]->mail, $datos_remitente[0]->nombre);
            $this->email->to($datos_destinatario[0]->mail); 
            //$this->email->cc('saint.tripper@gmail.com'); 
            $this->email->bcc('smartinmedina@hotmail.com'); 

            $this->email->subject($asunto);
            $this->email->message($mensaje);  

            $this->email->send();
            //PARA EL ENVIO DE MAILS FIN
        }else{
            $this->load->view('login/login');
        }
    }


    function formAddInstalacion(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "instalaciones", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteInstalacion($id_instalacion = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $instalacion = $this->instalacionesCRUD->getInstalacion($id_instalacion);    
            if(count($instalacion) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "instalaciones", 
                                                "pagina"=> "form_delete",
                                                "instalacion" => $instalacion[0]
                                                )
                                    );
            }else{
                //no hay instalacion con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditInstalacion($id_instalacion = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $instalacion = $this->instalacionesCRUD->getInstalacion($id_instalacion);        
            
            if(count($instalacion) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "instalaciones", 
                                                "pagina"=> "form_edit",
                                                "instalacion" => $instalacion[0]
                                                )
                                    );
            }else{
                // no hay instalacion con ese id
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function addInstalacion(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddInstalacion();
            }
            else
            {        
                $nombre = htmlentities($_POST['nombre']);

                $this->instalacionesCRUD->addInstalacion($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteInstalacion(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_instalacion = $_POST['id_instalacion'];

            $this->instalacionesCRUD->deleteInstalacion($id_instalacion);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editInstalacion(){

        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditInstalacion($_POST['id_instalacion']);
            }
            else
            {
                $id_instalacion =  $_POST['id_instalacion'];
                $nombre = htmlentities($_POST['nombre']);

                $this->instalacionesCRUD->editInstalacion($id_instalacion,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){ 
            $instalacion = $this->instalacionesCRUD->existeNombre($str);
            if(count($instalacion) > 0){
                $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            $this->load->view('login/login');
        }
    }



}