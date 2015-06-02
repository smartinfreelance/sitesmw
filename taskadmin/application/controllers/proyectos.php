<?php

class Proyectos extends CI_Controller
{
    function Proyectos()
    {
        parent::__construct();
        $this->load->model('proyectosCRUD');
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
                                        "proyectos" => $proyectos[0]
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

        $this->load->view("main", array(
                                        "modulo"=> "proyectos", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteProyecto($id_proyecto = 0){
        $proyecto = $this->proyectosCRUD->getProyecto($id_proyecto);    
        if(count($proyecto) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "proyectos", 
                                            "pagina"=> "form_delete",
                                            "proyecto" => $proyecto[0]
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
                                            "proyecto" => $proyecto[0]
                                            )
                                );
        }else{
            // no hay proyecto con ese id
        }
        
    }

    function addProyecto(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddProyecto();
        }
        else
        {
            $nombre = $_POST['nombre'];
            $this->proyectosCRUD->addProyecto($nombre);
            $this->index();
        }
    }

    function deleteProyecto(){
        $id_proyecto = $_POST['id_proyecto'];

        $this->proyectosCRUD->deleteProyecto($id_proyecto);

        $this->index();

    }

    function editProyecto(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        if($_POST['nombre']!=$_POST['nombre_check']){
            $this->form_validation->set_rules('nombre', 'Nombre', 'callback_existe_en_bbdd');
        }        

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditProyecto($_POST['id_proyecto']);
        }else{
            $id_proyecto = $_POST['id_proyecto'];
            $nombre = $_POST['nombre'];
            $this->proyectosCRUD->editProyecto($id_proyecto,$nombre);
            $this->index();
        }
        
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $proyecto = $this->proyectosCRUD->existeNombre($str);
        if(count($proyecto) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}