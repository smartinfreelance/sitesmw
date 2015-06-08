<?php

class TContactos extends CI_Controller
{
    function TContactos()
    {
        parent::__construct();
        $this->load->model('tcontactosCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "tcontactos";
            $total_rows = $this->tcontactosCRUD->getCantTContactos();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $tcontactos = $this->tcontactosCRUD->getXTContactos($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
                                        "pagina"=> "principal",
                                        "tcontactos" => $tcontactos,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getTContacto($id_tcontacto = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);
            if(count($tcontacto) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
                                            "pagina"=> "ver_tcontacto",
                                            "tcontacto" => $tcontacto[0]
                                            )
                                );
            }else{
                // No hay tcontactos con id = $id_tcontacto
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchTContacto($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $tcontactos = $this->tcontactosCRUD->getTContactosSearch($search);

            if(count($tcontactos) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
                                            "pagina"=> "resultado_busqueda",
                                            "tcontactos" => $tcontactos
                                            )
                                );
            }else{
                // No hay tcontactos con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
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


    function formAddTContacto(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "tcontactos", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteTContacto($id_tcontacto = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);    
            if(count($tcontacto) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "tcontactos", 
                                                "pagina"=> "form_delete",
                                                "tcontacto" => $tcontacto[0]
                                                )
                                    );
            }else{
                //no hay tcontacto con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditTContacto($id_tcontacto = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $tcontacto = $this->tcontactosCRUD->getTContacto($id_tcontacto);        
            
            if(count($tcontacto) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "tcontactos", 
                                                "pagina"=> "form_edit",
                                                "tcontacto" => $tcontacto[0]
                                                )
                                    );
            }else{
                // no hay tcontacto con ese id
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function addTContacto(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddTContacto();
            }
            else
            {        
                $nombre = htmlentities($_POST['nombre']);

                $this->tcontactosCRUD->addTContacto($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteTContacto(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_tcontacto = $_POST['id_tcontacto'];

            $this->tcontactosCRUD->deleteTContacto($id_tcontacto);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editTContacto(){

        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditTContacto($_POST['id_tcontacto']);
            }
            else
            {
                $id_tcontacto =  $_POST['id_tcontacto'];
                $nombre = htmlentities($_POST['nombre']);

                $this->tcontactosCRUD->editTContacto($id_tcontacto,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){ 
            $tcontacto = $this->tcontactosCRUD->existeNombre($str);
            if(count($tcontacto) > 0){
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