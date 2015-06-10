<?php

class EInmuebles extends CI_Controller
{
    function EInmuebles()
    {
        parent::__construct();
        $this->load->model('einmueblesCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "einmuebles";
            $total_rows = $this->einmueblesCRUD->getCantEInmuebles();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $einmuebles = $this->einmueblesCRUD->getXEInmuebles($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "einmuebles", 
                                        "pagina"=> "principal",
                                        "einmuebles" => $einmuebles,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getEInmueble($id_einmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $einmueble = $this->einmueblesCRUD->getEInmueble($id_einmueble);
            if(count($einmueble) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "einmuebles", 
                                            "pagina"=> "ver_einmueble",
                                            "einmueble" => $einmueble[0]
                                            )
                                );
            }else{
                // No hay einmuebles con id = $id_einmueble
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchEInmueble($search){

        if($this->session->userdata('idusuario_inmo')){ 
            $einmuebles = $this->einmueblesCRUD->getEInmueblesSearch($search);

            if(count($einmuebles) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "einmuebles", 
                                            "pagina"=> "resultado_busqueda",
                                            "einmuebles" => $einmuebles
                                            )
                                );
            }else{
                // No hay einmuebles con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }


    }

    function formEnvioConsulta(){
        if($this->session->userdata('idusuario_inmo')){ 
        
            $this->load->view("main", array(
                                            "modulo"=> "einmuebles", 
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


    function formAddEInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "einmuebles", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteEInmueble($id_einmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $einmueble = $this->einmueblesCRUD->getEInmueble($id_einmueble);    
            if(count($einmueble) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "einmuebles", 
                                                "pagina"=> "form_delete",
                                                "einmueble" => $einmueble[0]
                                                )
                                    );
            }else{
                //no hay einmueble con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditEInmueble($id_einmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $einmueble = $this->einmueblesCRUD->getEInmueble($id_einmueble);        
            
            if(count($einmueble) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "einmuebles", 
                                                "pagina"=> "form_edit",
                                                "einmueble" => $einmueble[0]
                                                )
                                    );
            }else{
                // no hay einmueble con ese id
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    function addEInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddEInmueble();
            }else{
                $nombre = htmlentities($_POST['nombre']);

                $this->einmueblesCRUD->addEInmueble($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteEInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $id_einmueble = $_POST['id_einmueble'];

            $this->einmueblesCRUD->deleteEInmueble($id_einmueble);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editEInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditEInmueble($_POST['id_einmueble']);
            }
            else
            {
                $id_einmueble =  $_POST['id_einmueble'];
                $nombre = htmlentities($_POST['nombre']);

                $this->einmueblesCRUD->editEInmueble($id_einmueble,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }
    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        if($this->session->userdata('idusuario_inmo')){ 
            $einmueble = $this->einmueblesCRUD->existeNombre($str);
            if(count($einmueble) > 0){
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