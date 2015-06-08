<?php

class Contactos extends CI_Controller
{
    function Contactos()
    {
        parent::__construct();
        $this->load->model('contactosCRUD');
        $this->load->model('tcontactosCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 

            $cant_rows = 10;
            $controller = "contactos";
            $total_rows = $this->contactosCRUD->getCantContactos();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $contactos = $this->contactosCRUD->getXContactos($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "contactos", 
                                        "pagina"=> "principal",
                                        "contactos" => $contactos,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getContacto($id_contacto = 0){
        
        if($this->session->userdata('idusuario_inmo')){
            $contacto = $this->contactosCRUD->getContacto($id_contacto);
            if(count($contacto) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "contactos", 
                                            "pagina"=> "ver_contacto",
                                            "contacto" => $contacto[0]
                                            )
                                );
            }else{
                // No hay contactos con id = $id_contacto
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchContacto($search){

        if($this->session->userdata('idusuario_inmo')){

            $contactos = $this->contactosCRUD->getContactosSearch($search);

            if(count($contactos) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "contactos", 
                                            "pagina"=> "resultado_busqueda",
                                            "contactos" => $contactos
                                            )
                                );
            }else{
                // No hay contactos con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){

            $this->load->view("main", array(
                                            "modulo"=> "contactos", 
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


    function formAddContacto(){

        if($this->session->userdata('idusuario_inmo')){
            $tcontactos = $this->tcontactosCRUD->getTContactos();
            $this->load->view("main", array(
                                            "modulo"=> "contactos", 
                                            "pagina"=> "form_add",
                                            "tcontactos" => $tcontactos
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteContacto($id_contacto = 0){

        if($this->session->userdata('idusuario_inmo')){
            $contacto = $this->contactosCRUD->getContacto($id_contacto);   
            if(count($contacto) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "contactos", 
                                                "pagina"=> "form_delete",
                                                "contacto" => $contacto[0]
                                                )
                                    );
            }else{
                //no hay contacto con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditContacto($id_contacto = 0){

        if($this->session->userdata('idusuario_inmo')){
            $contacto = $this->contactosCRUD->getContacto($id_contacto);        
            $tcontactos = $this->tcontactosCRUD->getTContactos(); 
            if(count($contacto) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "contactos", 
                                                "pagina"=> "form_edit",
                                                "contacto" => $contacto[0],
                                                "tcontactos" => $tcontactos
                                                )
                                    );
            }else{
                // no hay contacto con ese id
            }
        }else{
            $this->load->view('login/login');
        }
        
    }

    function addContacto(){

        if($this->session->userdata('idusuario_inmo')){

            $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            $this->form_validation->set_rules('telefono', 'telefono', 'required|min_length[7]|max_length[14]|is_numeric');
            $this->form_validation->set_rules('id_tipo', 'tipo contacto', 'required');
            $this->form_validation->set_rules('mail', 'e-mail', 'required|valid_email');

            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddContacto();
            }
            else
            {
                $nombre = htmlentities($_POST['nombre']);
                $telefono = $_POST['telefono'];
                $id_tipo = $_POST['id_tipo'];
                $mail = $_POST['mail'];

                $this->contactosCRUD->addContacto($nombre,$telefono,$id_tipo,$mail);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }

        
    }

    function deleteContacto(){

        if($this->session->userdata('idusuario_inmo')){
            $id_contacto = $_POST['id_contacto'];

            $this->contactosCRUD->deleteContacto($id_contacto);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editContacto(){

        if($this->session->userdata('idusuario_inmo')){
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }  
            $this->form_validation->set_rules('telefono', 'telefono', 'required|min_length[7]|max_length[14]|is_numeric');
            $this->form_validation->set_rules('id_tipo', 'tipo', 'required');
            $this->form_validation->set_rules('mail', 'E-mail', 'required|valid_email');

            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditContacto($_POST['id_contacto']);
            }
            else
            {
                $id_contacto = $_POST['id_contacto'];
                $nombre = htmlentities($_POST['nombre']);
                $telefono = $_POST['telefono'];
                $id_tipo = $_POST['id_tipo'];
                $mail = $_POST['mail'];

                $this->contactosCRUD->editContacto($id_contacto,$nombre,$telefono,$id_tipo,$mail);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){
            $contacto = $this->contactosCRUD->existeNombre($str);
            if(count($contacto) > 0){
                $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
                return FALSE;
            }else{
                return TRUE;
            }
        }else{
            $this->load->view('login/login');
        }
    }
    //FIN DE FUNCIONES DE VALIDACION//
}