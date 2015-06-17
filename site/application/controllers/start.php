<?php
class Start extends CI_Controller {
    function Start()
    {
        parent::__construct();

        $this->load->model('novedadesCRUD');
        $this->load->model('entradasCRUD');
    }
    function index()
    {
        $novedades = $this->novedadesCRUD->getNovedades();
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'home',
                    "pagina" => 'index',
                    "novedades" => $novedades
                )
            );

    }
    function verProductos()
    {
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'productos',
                    "pagina" => 'index'
                )
            );

    }
    function verServicios()
    {
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'servicios',
                    "pagina" => 'index'
                )
            );

    }
    function verWebBlog()
    {
        $entradas = $this->entradasCRUD->getEntradas();
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'webblog',
                    "pagina" => 'index'
                )
            );

    }
    
    function verContacto()
    {
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'contacto',
                    "pagina" => 'index'
                )
            );

    }

    function sendConsulta(){

        $this->form_validation->set_rules('nombre','nombre','required');
        $this->form_validation->set_rules('mensaje','mensaje','required');
        $this->form_validation->set_rules('mail', 'e-mail', 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->verContacto();
        }
        else
        {    
            $this->load->library('email');

            $this->email->from($datos_remitente[0]->mail, $datos_remitente[0]->nombre);
            $this->email->to($datos_destinatario[0]->mail); 
            //$this->email->cc('saint.tripper@gmail.com'); 
            $this->email->bcc('smartinmedina@hotmail.com'); 

            $this->email->subject($asunto);
            $this->email->message($mensaje);  

            $this->email->send();

            $this->load->view(
                    'main', 
                    array(
                        "modulo" => 'contacto',
                        "pagina" => 'gracias'
                    )
                );
        }
    }
}
?>