<?php

class TInmuebles extends CI_Controller
{
    function TInmuebles()
    {
        parent::__construct();
        $this->load->model('tinmueblesCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "tinmuebles";
            $total_rows = $this->tinmueblesCRUD->getCantTInmuebles();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $tinmuebles = $this->tinmueblesCRUD->getXTInmuebles($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
                                        "pagina"=> "principal",
                                        "tinmuebles" => $tinmuebles,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getTInmueble($id_tinmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);
            if(count($tinmueble) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
                                            "pagina"=> "ver_tinmueble",
                                            "tinmueble" => $tinmueble[0]
                                            )
                                );
            }else{
                // No hay tinmuebles con id = $id_tinmueble
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchTInmueble($search){

        if($this->session->userdata('idusuario_inmo')){ 
            $tinmuebles = $this->tinmueblesCRUD->getTInmueblesSearch($search);

            if(count($tinmuebles) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
                                            "pagina"=> "resultado_busqueda",
                                            "tinmuebles" => $tinmuebles
                                            )
                                );
            }else{
                // No hay tinmuebles con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }


    }

    function formEnvioConsulta(){
        if($this->session->userdata('idusuario_inmo')){ 
        
            $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
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


    function formAddTInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "tinmuebles", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteTInmueble($id_tinmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);    
            if(count($tinmueble) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "tinmuebles", 
                                                "pagina"=> "form_delete",
                                                "tinmueble" => $tinmueble[0]
                                                )
                                    );
            }else{
                //no hay tinmueble con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditTInmueble($id_tinmueble = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $tinmueble = $this->tinmueblesCRUD->getTInmueble($id_tinmueble);        
            
            if(count($tinmueble) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "tinmuebles", 
                                                "pagina"=> "form_edit",
                                                "tinmueble" => $tinmueble[0]
                                                )
                                    );
            }else{
                // no hay tinmueble con ese id
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    function addTInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddTInmueble();
            }else{
                $nombre = htmlentities($_POST['nombre']);

                $this->tinmueblesCRUD->addTInmueble($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteTInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            $id_tinmueble = $_POST['id_tinmueble'];

            $this->tinmueblesCRUD->deleteTInmueble($id_tinmueble);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editTInmueble(){
        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditTInmueble($_POST['id_tinmueble']);
            }
            else
            {
                $id_tinmueble =  $_POST['id_tinmueble'];
                $nombre = htmlentities($_POST['nombre']);

                $this->tinmueblesCRUD->editTInmueble($id_tinmueble,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }
    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        if($this->session->userdata('idusuario_inmo')){ 
            $tinmueble = $this->tinmueblesCRUD->existeNombre($str);
            if(count($tinmueble) > 0){
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