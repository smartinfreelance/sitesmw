<?php

class Fotos extends CI_Controller
{
    function Fotos()
    {
        parent::__construct();
        $this->load->model('fotosCRUD');
    }

    function index($pagina_nro = 0)
    {
        if($this->session->userdata('idusuario_inmo')){ 
            $cant_rows = 10;
            $controller = "fotos";
            $total_rows = $this->fotosCRUD->getCantFotos();

            $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

            $desde_row = $pagina_nro * $cant_rows;
            $fotos = $this->fotosCRUD->getXFotos($desde_row,$cant_rows);
            $this->load->view("main", array(
                                        "modulo"=> "fotos", 
                                        "pagina"=> "principal",
                                        "fotos" => $fotos,
                                        "links" => $linksPaginacion
                                        )
                            );
        }else{
            $this->load->view('login/login');
        }
    }

    function getFoto($id_foto = 0){
        if($this->session->userdata('idusuario_inmo')){ 
            $foto = $this->fotosCRUD->getFoto($id_foto);
            if(count($foto) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "fotos", 
                                            "pagina"=> "ver_foto",
                                            "foto" => $foto[0]
                                            )
                                );
            }else{
                // No hay fotos con id = $id_foto
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function searchFoto($search){

        if($this->session->userdata('idusuario_inmo')){ 

            $fotos = $this->fotosCRUD->getFotosSearch($search);

            if(count($fotos) > 0){
                $this->load->view("main", array(
                                            "modulo"=> "fotos", 
                                            "pagina"=> "resultado_busqueda",
                                            "fotos" => $fotos
                                            )
                                );
            }else{
                // No hay fotos con los filtros configurados
            }
        }else{
            $this->load->view('login/login');
        }
    }

    function formEnvioConsulta(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "fotos", 
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


    function formAddFoto(){

        if($this->session->userdata('idusuario_inmo')){ 
            $this->load->view("main", array(
                                            "modulo"=> "fotos", 
                                            "pagina"=> "form_add"
                                            )
                                );
        }else{
            $this->load->view('login/login');
        }

    }

    function formDeleteFoto($id_foto = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $foto = $this->fotosCRUD->getFoto($id_foto);    
            if(count($foto) > 0){    
                $this->load->view("main", array(
                                                "modulo"=> "fotos", 
                                                "pagina"=> "form_delete",
                                                "foto" => $foto[0]
                                                )
                                    );
            }else{
                //no hay foto con ese id
            }
        }else{
            $this->load->view('login/login');
        }

    }

    function formEditFoto($id_foto = 0){

        if($this->session->userdata('idusuario_inmo')){ 
            $foto = $this->fotosCRUD->getFoto($id_foto);        
            
            if(count($foto) > 0){
                $this->load->view("main", array(
                                                "modulo"=> "fotos", 
                                                "pagina"=> "form_edit",
                                                "foto" => $foto[0]
                                                )
                                    );
            }else{
                // no hay foto con ese id
            }
        }else{
            $this->load->view('login/login');
        }
    }

    /*function addFoto(){

        if($this->session->userdata('idusuario_inmo')){ 

            $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formAddFoto();
            }
            else
            {        
                $nombre = htmlentities($_POST['nombre']);

                $this->fotosCRUD->addFoto($nombre);

                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
    }*/

    function addFoto()
    {
        //echo base_url().'uploads/';
        //$config['file_name'] = 'test';
        $config['upload_path'] = './uploads/otro/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view("main", array(
                                            "modulo"=> "fotos", 
                                            "pagina"=> "form_add",
                                            "error" => $error
                                            )
                                );
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $datos = $this->upload->data();

            $config['image_library'] = 'gd2';
            $config['source_image'] = $datos['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']    = 100;
            $config['height']   = 75;

            $this->load->library('image_lib', $config); 

            $this->image_lib->resize();

            $this->load->view('upload_success', $data);
        }
    }

    function deleteFoto(){

        if($this->session->userdata('idusuario_inmo')){ 
            $id_foto = $_POST['id_foto'];

            $this->fotosCRUD->deleteFoto($id_foto);

            $this->index();
        }else{
            $this->load->view('login/login');
        }

    }

    function editFoto(){

        if($this->session->userdata('idusuario_inmo')){ 
            if($_POST['nombre']!=$_POST['nombre_check']){
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]|callback_existe_en_bbdd');
            }else{
                $this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[2]|max_length[50]');
            }        
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->formEditFoto($_POST['id_foto']);
            }
            else
            {
                $id_foto =  $_POST['id_foto'];
                $nombre = htmlentities($_POST['nombre']);

                $this->fotosCRUD->editFoto($id_foto,$nombre);
                $this->index();
            }
        }else{
            $this->load->view('login/login');
        }
        
    }


    //FUNCIONES DE VALIDACION//
    function existe_en_bbdd($str){

        if($this->session->userdata('idusuario_inmo')){ 
            $foto = $this->fotosCRUD->existeNombre($str);
            if(count($foto) > 0){
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