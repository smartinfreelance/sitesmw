<?php

class TComentarios extends CI_Controller
{
    function TComentarios()
    {
        parent::__construct();
        $this->load->model('tcomentariosCRUD');
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
                                        "tcomentarios" => $tcomentarios
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

        $this->load->view("main", array(
                                        "modulo"=> "tcomentarios", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTComentario($id_tcomentario = 0){
        $tcomentario = $this->tcomentariosCRUD->getTComentario($id_tcomentario);    
        if(count($tcomentario) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "tcomentarios", 
                                            "pagina"=> "form_delete",
                                            "tcomentario" => $tcomentario
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
                                            "tcomentario" => $tcomentario
                                            )
                                );
        }else{
            // no hay tcomentario con ese id
        }
        
    }

    function addTComentario(){
        $id_task = $_POST['id_task'];
        $id_usuario = $_POST['id_usuario'];
        $comentario = $_POST['comentario'];

        $this->tcomentariosCRUD->addTComentario($id_task,$id_usuario,$comentario);

        $this->index();
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