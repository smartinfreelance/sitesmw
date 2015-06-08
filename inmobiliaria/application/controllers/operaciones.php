<?php

class Operaciones extends CI_Controller
{
    function Operaciones()
    {
        parent::__construct();
        $this->load->model('operacionesCRUD');
    }

    function index($pagina_nro = 0)
    {
        $cant_rows = 10;
        $controller = "operaciones";
        $total_rows = $this->operacionesCRUD->getCantOperaciones();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $operaciones = $this->operacionesCRUD->getXOperaciones($desde_row,$cant_rows);
        $this->load->view("main", array(
                                    "modulo"=> "operaciones", 
                                    "pagina"=> "principal",
                                    "operaciones" => $operaciones,
                                    "links" => $linksPaginacion
                                    )
                        );
    }

    function getOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);
        if(count($operacion) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "ver_operacion",
                                        "operacion" => $operacion[0]
                                        )
                            );
        }else{
            // No hay operaciones con id = $id_operacion
        }

    }

    function searchOperacion($search){

        $operaciones = $this->operacionesCRUD->getOperacionesSearch($search);

        if(count($operaciones) > 0){
            $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "resultado_busqueda",
                                        "operaciones" => $operaciones
                                        )
                            );
        }else{
            // No hay operaciones con los filtros configurados
        }


    }

    function formEnvioConsulta(){
        $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
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


    function formAddOperacion(){
        $this->load->view("main", array(
                                        "modulo"=> "operaciones", 
                                        "pagina"=> "form_add"
                                        )
                            );

    }

    function formDeleteOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);    
        if(count($operacion) > 0){    
            $this->load->view("main", array(
                                            "modulo"=> "operaciones", 
                                            "pagina"=> "form_delete",
                                            "operacion" => $operacion[0]
                                            )
                                );
        }else{
            //no hay operacion con ese id
        }

    }

    function formEditOperacion($id_operacion = 0){
        $operacion = $this->operacionesCRUD->getOperacion($id_operacion);        
        
        if(count($operacion) > 0){
            $this->load->view("main", array(
                                            "modulo"=> "operaciones", 
                                            "pagina"=> "form_edit",
                                            "operacion" => $operacion[0]
                                            )
                                );
        }else{
            // no hay operacion con ese id
        }
        
    }

    function addOperacion(){
        
        $this->form_validation->set_rules('nombre', 'nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');

        if ($this->form_validation->run() == FALSE)
        {
            $this->formAddOperacion();
        }
        else
        {

            $this->operacionesCRUD->addOperacion($nombre);

            $this->index();
        }
    }

    function deleteOperacion(){
        $id_operacion = $_POST['id_operacion'];

        $this->operacionesCRUD->deleteOperacion($id_operacion);

        $this->index();

    }

    function editOperacion(){

        if($_POST['nombre']!=$_POST['nombre_check']){
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
        }else{
            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
        }  

        if ($this->form_validation->run() == FALSE)
        {
            $this->formEditOperacion($_POST['id_operacion']);
        }
        else
        {
            $id_operacion =  $_POST['id_operacion'];
            $nombre = $_POST['nombre'];

            $this->operacionesCRUD->editOperacion($id_operacion,$nombre);
            $this->index();
        }
    }

    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){
        $operacion = $this->operacionesCRUD->existeNombre($str);
        if(count($operacion) > 0){
            $this->form_validation->set_message('existe_en_bbdd', 'Ya existe un registro con %s :"'.$str.'". Modifique este campo.');
            return FALSE;
        }else{
            return TRUE;
        }
    }

}