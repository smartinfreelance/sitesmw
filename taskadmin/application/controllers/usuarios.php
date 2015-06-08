<?php

class Usuarios extends CI_Controller
{
    function Usuarios()
    {
        parent::__construct();
        $this->load->model('usuariosCRUD');
        $this->load->model('rolesCRUD');
    }

    function index($pagina_nro = 0)
    {
        $cant_rows = 10;
        $controller = "usuarios";
        $total_rows = $this->usuariosCRUD->getCantUsuarios();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $usuarios = $this->usuariosCRUD->getXUsuarios($desde_row,$cant_rows);
        $this->load->view("main", array(
                                    "modulo"=> "usuarios", 
                                    "pagina"=> "principal",
                                    "usuarios" => $usuarios,
                                    "links" => $linksPaginacion
                                    )
                        );
    }

    function getUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "ver_usuario",
                                        "usuario" => $usuario[0]
                                        )
                            );
        }else{
            // No hay usuarios con id = $id_usuario
        }

    }

    function searchUsuario($search){

        $usuarios = $this->usuariosCRUD->getUsuariosSearch($search);

        if(count($usuarios) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "resultado_busqueda",
                                        "usuarios" => $usuarios
                                        )
                            );
        }else{
            // No hay usuarios con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
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


    function formAddUsuario(){

        $roles = $this->rolesCRUD->getRoles();
        $this->load->view("main", array(
                                        "modulo"=> "usuarios", 
                                        "pagina"=> "form_add",
                                        "roles" => $roles
                                        )
                            );

    }

    function formDeleteUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);    
        if(count($usuario) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_delete",
                                            "usuario" => $usuario[0]
                                            )
                                );
        }else{
            //no hay usuario con ese id
        }

    }

    function formEditUsuario($id_usuario = 0){
        $usuario = $this->usuariosCRUD->getUsuario($id_usuario);
        $roles = $this->rolesCRUD->getRoles();
        if(count($usuario) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "usuarios", 
                                            "pagina"=> "form_edit",
                                            "usuario" => $usuario[0],
                                            "roles" => $roles
                                            )
                                );
        }else{
            // no hay usuario con ese id
        }
        
    }

    function addUsuario(){

        $this->form_validation->set_rules('usuario','usuario','trim|max_length[16]|min_length[6]|required|alpha_dash|callback_existe_en_bbdd');
        $this->form_validation->set_rules('password','password','trim|max_length[16]|min_length[6]|required');
        $this->form_validation->set_rules('password_conf','confirmacion password','matches[password]|required');
        $this->form_validation->set_rules('nombre','nombre','trim|max_length[35]|min_length[2]|required');
        $this->form_validation->set_rules('apellido','apellido','trim|max_length[35]|min_length[2]|required');
        $this->form_validation->set_rules('mail','mail','trim|valid_email|max_length[35]|min_length[8]|required');
        $this->form_validation->set_rules('id_rol','rol','required');

        if ($this->form_validation->run() == FALSE){
            $this->formAddUsuario();

        }else{
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $nombre = $_POST['nombre'];            
            $apellido = $_POST['apellido'];
            $id_rol = $_POST['id_rol'];
            $mail = $_POST['mail'];

            $this->usuariosCRUD->addUsuario($usuario, $password,$nombre,$apellido,$mail,$id_rol);

            $this->index();
        }
    }

    function deleteUsuario(){
        $id_usuario = $_POST['id_usuario'];

        $this->usuariosCRUD->deleteUsuario($id_usuario);

        $this->index();

    }

    function editUsuario(){

        $this->form_validation->set_rules('nombre','nombre','trim|max_length[35]|min_length[2]|alpha_dash|required');
        $this->form_validation->set_rules('apellido','apellido','trim|max_length[35]|min_length[2]|required');
        $this->form_validation->set_rules('mail','mail','trim|max_length[35]|min_length[8]|required|valid_email');
        $this->form_validation->set_rules('id_rol','id_rol','required');

        if ($this->form_validation->run() == FALSE){
            $this->formEditUsuario($_POST['id_usuario']);

        }else{
            $id_usuario = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $id_rol = $_POST['id_rol'];
            $mail = $_POST['mail'];

            $this->usuariosCRUD->editUsuario($id_usuario,$nombre,$apellido,$id_rol,$mail);

            $this->index();
        }
        
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $usuario = $this->usuariosCRUD->existeNombre($str);
        if(count($usuario) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}