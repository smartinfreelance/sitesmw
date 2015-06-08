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
        $cant_rows = 2;
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
    }

    function getTInmueble($id_tinmueble = 0){
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

    }

    function searchTInmueble($search){

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


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
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


    function formAddTInmueble(){
        $this->load->view("main", array(
                                        "modulo"=> "tinmuebles", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTInmueble($id_tinmueble = 0){
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

    }

    function formEditTInmueble($id_tinmueble = 0){
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
        
    }


    function addTInmueble(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTInmueble();
        }else{
            $nombre = $_POST['nombre'];

            $this->tinmueblesCRUD->addTInmueble($nombre);

            $this->index();
        }

    function deleteTInmueble(){
        $id_tinmueble = $_POST['id_tinmueble'];

        $this->tinmueblesCRUD->deleteTInmueble($id_tinmueble);

        $this->index();

    }

    function editTInmueble(){
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
            $nombre = $_POST['nombre'];

            $this->tinmueblesCRUD->editTInmueble($id_tinmueble,$nombre);
            $this->index();
        }
        
    }
    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $tinmueble = $this->tinmueblesCRUD->existeNombre($str);
        if(count($tinmueble) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }


}