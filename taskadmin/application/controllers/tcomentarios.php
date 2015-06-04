<?php

class TComentarios extends CI_Controller
{
    function TComentarios()
    {
        parent::__construct();
        $this->load->model('tcomentariosCRUD');
        $this->load->model('tasksCRUD');
        $this->load->model('usuariosCRUD');
    }

    function index()
    {
        $tcomentarios = $this->tcomentariosCRUD->getTComentarios();
        $this->load->view("main", array(
                                    "modulo"=> "tcomentarios", 
                                    "pagina"=> "principal",
                                    "tcomentarios" => $tcomentarios
                                    )
                        );
    }

    function getTComentario($id_tcomentario = 0){
        $tcomentario = $this->tcomentariosCRUD->getTComentario($id_tcomentario);
        if(count($tcomentario) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tcomentarios", 
                                        "pagina"=> "ver_tcomentario",
                                        "tcomentario" => $tcomentario[0]
                                        )
                            );
        }else{
            // No hay tcomentarios con id = $id_tcomentario
        }

    }

    function searchTComentario($search){

        $tcomentarios = $this->tcomentariosCRUD->getTComentariosSearch($search);

        if(count($tcomentarios) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "tcomentarios", 
                                        "pagina"=> "resultado_busqueda",
                                        "tcomentarios" => $tcomentarios
                                        )
                            );
        }else{
            // No hay tcomentarios con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tcomentarios", 
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


    function formAddTComentario(){

        $usuarios = $this->usuariosCRUD->getUsuarios();
        $tasks = $this->tasksCRUD->getTasks();

        $this->load->view("main", array(
                                        "modulo"=> "tcomentarios", 
                                        "pagina"=> "form_add",
                                        "usuarios" => $usuarios,
                                        "tasks" => $tasks
                                        )
                            );

    }

    function formDeleteTComentario($id_tcomentario = 0){
        $tcomentario = $this->tcomentariosCRUD->getTComentario($id_tcomentario);    
        if(count($tcomentario) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tcomentarios", 
                                            "pagina"=> "form_delete",
                                            "tcomentario" => $tcomentario[0]
                                            )
                                );
        }else{
            //no hay tcomentario con ese id
        }

    }

    function formEditTComentario($id_tcomentario = 0){
        $tcomentario = $this->tcomentariosCRUD->getTComentario($id_tcomentario);        
        
        if(count($tcomentario) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "tcomentarios", 
                                            "pagina"=> "form_edit",
                                            "tcomentario" => $tcomentario[0]
                                            )
                                );
        }else{
            // no hay tcomentario con ese id
        }
        
    }

    function addTComentario(){

        $this->form_validation->set_rules('id_task','task','required');
        $this->form_validation->set_rules('id_usuario','usuario','required');
        $this->form_validation->set_rules('comentario','comentario', 'trim|max_length[1000]|min_lenght[2]|required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTComentario();
        }else{
            $id_task = $_POST['id_task'];
            $id_usuario = $_POST['id_usuario'];
            $comentario = $_POST['comentario'];

            $this->tcomentariosCRUD->addTComentario($id_task,$id_usuario,$comentario);

            $this->index();
        }
    }

    function deleteTComentario(){
        $id_tcomentario = $_POST['id_tcomentario'];

        $this->tcomentariosCRUD->deleteTComentario($id_tcomentario);

        $this->index();

    }

    function editTComentario(){
        $id_tcomentario = $_POST['id_tcomentario'];
        $id_task = $_POST['id_task'];
        $id_usuario = $_POST['id_usuario'];
        $comentario = $_POST['comentario'];

        $this->tcomentariosCRUD->editTComentario($id_tcomentario,$id_task,$id_usuario,$comentario);

        $this->index();
        
    }

}