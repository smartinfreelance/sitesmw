<?php

class Roles extends CI_Controller
{
    function Roles()
    {
        parent::__construct();
        $this->load->model('rolesCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "roles";
            $total_rows = $this->rolesCRUD->getCantRoles();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $roles = $this->rolesCRUD->getXRoles($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "principal",
                                        "roles" => $roles,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getRol($id_rol = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $rol = $this->rolesCRUD->getRol($id_rol);
            if(count($rol) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "ver_rol",
                                            "rol" => $rol[0]
                                            )
                                );
            }else{
                // No hay roles con id = $id_rol
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchRol($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $roles = $this->rolesCRUD->getRolesSearch($search);

            if(count($roles) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "resultado_busqueda",
                                            "roles" => $roles
                                            )
                                );
            }else{
                // No hay roles con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
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


    function formAddRol(){
        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteRol($id_rol = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $rol = $this->rolesCRUD->getRol($id_rol);    
            if(count($rol) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "roles", 
                                                "pagina"=> "form_delete",
                                                "rol" => $rol[0]
                                                )
                                    );
            }else{
                //no hay rol con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditRol($id_rol = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $rol = $this->rolesCRUD->getRol($id_rol);        
            
            if(count($rol) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "roles", 
                                                "pagina"=> "form_edit",
                                                "rol" => $rol[0]
                                                )
                                    );
            }else{
                // no hay rol con ese id
            }
        }else{
            $this->load->view('login/login');
        }
        
    }

    function addRol(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');

            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddRol();
            }
            else
            {
                $nombre = htmlentities($_POST['nombre']);

                $this->rolesCRUD->addRol($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function deleteRol(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_rol = $_POST['id_rol'];

            $this->rolesCRUD->deleteRol($id_rol);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editRol(){

        if($this->session->userdata('idusuario_inmo')){ 

            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditRol($_POST['id_rol']);
            }
            else
            {
                $id_rol =  $_POST['id_rol'];
                $nombre = htmlentities($_POST['nombre']);

                $this->rolesCRUD->editRol($id_rol,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        if($this->session->userdata('idusuario_inmo')){ 
            $rol = $this->rolesCRUD->existeNombre($str);
            if(count($rol) > 0){
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