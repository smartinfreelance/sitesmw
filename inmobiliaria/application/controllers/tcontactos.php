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
        $cant_rows = 2;
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
    }

    function getTContacto($id_tcontacto = 0){
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

    }

    function searchTContacto($search){

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


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
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


    function formAddTContacto(){
        $this->load->view("main", array(
                                        "modulo"=> "tcontactos", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteTContacto($id_tcontacto = 0){
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

    }

    function formEditTContacto($id_tcontacto = 0){
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
        
    }

    function addTContacto(){

        $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
        
        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddTContacto();
        }
        else
        {        
            $nombre = $_POST['nombre'];

            $this->tcontactosCRUD->addTContacto($nombre);

            $this->index();
        }
    }

    function deleteTContacto(){
        $id_tcontacto = $_POST['id_tcontacto'];

        $this->tcontactosCRUD->deleteTContacto($id_tcontacto);

        $this->index();

    }

    function editTContacto(){
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
            $nombre = $_POST['nombre'];

            $this->tcontactosCRUD->editTContacto($id_tcontacto,$nombre);
            $this->index();
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $tcontacto = $this->tcontactosCRUD->existeNombre($str);
        if(count($tcontacto) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }



}