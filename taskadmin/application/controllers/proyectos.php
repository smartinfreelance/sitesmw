<?php

class Proyectos extends CI_Controller
{
    function Proyectos()
    {
        parent::__construct();
        $this->load->model('proyectosCRUD');
        $this->load->model('tproyectosCRUD');
    }

    function index()
    {
        $proyectos = $this->proyectosCRUD->getProyectos();
        $this->load->view("main", array(
                                    "modulo"=> "proyectos", 
                                    "pagina"=> "principal",
                                    "proyectos" => $proyectos
                                    )
                        );
    }

    function getProyecto($id_proyecto = 0){
        $proyecto = $this->proyectosCRUD->getProyecto($id_proyecto);
        if(count($proyecto) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "proyectos", 
                                        "pagina"=> "ver_proyecto",
                                        "proyectos" => $proyectos
                                        )
                            );
        }else{
            // No hay proyectos con id = $id_proyecto
        }

    }

    function searchProyecto($search){

        $proyectos = $this->proyectosCRUD->getProyectosSearch($search);

        if(count($proyectos) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "proyectos", 
                                        "pagina"=> "resultado_busqueda",
                                        "proyectos" => $proyectos
                                        )
                            );
        }else{
            // No hay proyectos con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "proyectos", 
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


    function formAddProyecto(){
        $tproyectos = $this->tproyectosCRUD->getTProyectos();
        $this->load->view("main", array(
                                        "modulo"=> "proyectos", 
                                        "pagina"=> "form_add",
                                        "tproyectos" => $tproyectos
                                        )
                            );

    }

    function formDeleteProyecto($id_proyecto = 0){
        $proyecto = $this->proyectosCRUD->getProyecto($id_proyecto);    
        if(count($proyecto) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "proyectos", 
                                            "pagina"=> "form_delete",
                                            "proyecto" => $proyecto
                                            )
                                );
        }else{
            //no hay proyecto con ese id
        }

    }

    function formEditProyecto($id_proyecto = 0){
        $proyecto = $this->proyectosCRUD->getProyecto($id_proyecto);        
        
        if(count($proyecto) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "proyectos", 
                                            "pagina"=> "form_edit",
                                            "proyecto" => $proyecto
                                            )
                                );
        }else{
            // no hay proyecto con ese id
        }
        
    }

    function addProyecto(){
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $id_tipo = $_POST['id_tipo'];
        $mail = $_POST['mail'];

        $this->proyectosCRUD->addProyecto($nombre,$telefono,$id_tipo,$mail);

        $this->index();
    }

    function deleteProyecto(){
        $id_proyecto = $_POST['id_proyecto'];

        $this->proyectosCRUD->deleteProyecto($id_proyecto);

        $this->index();

    }

    function editProyecto(){
        $nombre = $_POST['id_proyecto'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $id_tipo = $_POST['id_tipo'];
        $mail = $_POST['mail'];

        $this->proyectosCRUD->editProyecto($id_proyecto,$nombre,$telefono,$id_tipo,$mail);

        $this->index();
        
    }

}