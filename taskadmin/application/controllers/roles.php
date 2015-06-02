<?php

class Roles extends CI_Controller
{
    function Roles()
    {
        parent::__construct();
        $this->load->model('rolesCRUD');
    }

    function index()
    {
        $roles = $this->rolesCRUD->getRoles();
        $this->load->view("main", array(
                                    "modulo"=> "roles", 
                                    "pagina"=> "principal",
                                    "roles" => $roles
                                    )
                        );
    }

    function getRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);
        if(count($rol) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "ver_rol",
                                        "roles" => $roles
                                        )
                            );
        }else{
            // No hay roles con id = $id_rol
        }

    }

    function searchRol($search){

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


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "form_add"
                                        )
                            );
    }

    function envioConsulta(){
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
    }


    function formAddRol(){
        $roles = $this->rolesCRUD->getRoles();
        $this->load->view("main", array(
                                        "modulo"=> "roles", 
                                        "pagina"=> "form_add",
                                        "roles"=> $roles
                                        )
                            );

    }

    function formDeleteRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);    
        if(count($rol) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "form_delete",
                                            "rol" => $rol
                                            )
                                );
        }else{
            //no hay rol con ese id
        }

    }

    function formEditRol($id_rol = 0){
        $rol = $this->rolesCRUD->getRol($id_rol);        
        
        if(count($rol) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "roles", 
                                            "pagina"=> "form_edit",
                                            "rol" => $rol
                                            )
                                );
        }else{
            // no hay rol con ese id
        }
        
    }

    function addRol(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        $this->form_validation->set_rules('id_superior', 'rol superior', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddRol();
        }
        else
        {
            $nombre = $_POST['nombre'];
            $id_superior = $_POST['id_superior'];

            $this->rolesCRUD->addRol($nombre,$id_superior);

            $this->index();
        }

    }

    function deleteRol(){
        $id_rol = $_POST['id_rol'];

        $this->rolesCRUD->deleteRol($id_rol);

        $this->index();

    }

    function editRol(){
        

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('id_superior', 'rol superior', 'required');
        if($_POST['nombre']!=$_POST['nombre_check']){
            $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        }        

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditRol($_POST['id_rol']);
        }
        else
        {
            $id_rol = $_POST['id_rol'];
            $nombre = $_POST['nombre'];
            $nombre = $_POST['id_superior'];

            $this->rolesCRUD->editRol($id_rol,$nombre,$id_superior);

            $this->index();
        }      
        
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $rol = $this->rolesCRUD->existeNombre($str);
        if(count($rol) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}