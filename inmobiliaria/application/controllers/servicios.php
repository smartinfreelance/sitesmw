<?php

class Servicios extends CI_Controller
{
    function Servicios()
    {
        parent::__construct();
        $this->load->model('serviciosCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "servicios";
            $total_rows = $this->serviciosCRUD->getCantServicios();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $servicios = $this->serviciosCRUD->getXServicios($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "servicios", 
                                        "pagina"=> "principal",
                                        "servicios" => $servicios,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getServicio($id_servicio = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $servicio = $this->serviciosCRUD->getServicio($id_servicio);
            if(count($servicio) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "servicios", 
                                            "pagina"=> "ver_servicio",
                                            "servicio" => $servicio[0]
                                            )
                                );
            }else{
                // No hay servicios con id = $id_servicio
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchServicio($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $servicios = $this->serviciosCRUD->getServiciosSearch($search);

            if(count($servicios) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "servicios", 
                                            "pagina"=> "resultado_busqueda",
                                            "servicios" => $servicios
                                            )
                                );
            }else{
                // No hay servicios con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "servicios", 
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


    function formAddServicio(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "servicios", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteServicio($id_servicio = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $servicio = $this->serviciosCRUD->getServicio($id_servicio);    
            if(count($servicio) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "servicios", 
                                                "pagina"=> "form_delete",
                                                "servicio" => $servicio[0]
                                                )
                                    );
            }else{
                //no hay servicio con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditServicio($id_servicio = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $servicio = $this->serviciosCRUD->getServicio($id_servicio);        
            
            if(count($servicio) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "servicios", 
                                                "pagina"=> "form_edit",
                                                "servicio" => $servicio[0]
                                                )
                                    );
            }else{
                // no hay servicio con ese id
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function addServicio(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddServicio();
            }
            else
            {        
                $nombre = htmlentities($_POST['nombre']);

                $this->serviciosCRUD->addServicio($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteServicio(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_servicio = $_POST['id_servicio'];

            $this->serviciosCRUD->deleteServicio($id_servicio);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editServicio(){

        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditServicio($_POST['id_servicio']);
            }
            else
            {
                $id_servicio =  $_POST['id_servicio'];
                $nombre = htmlentities($_POST['nombre']);

                $this->serviciosCRUD->editServicio($id_servicio,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){ 
            $servicio = $this->serviciosCRUD->existeNombre($str);
            if(count($servicio) > 0){
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