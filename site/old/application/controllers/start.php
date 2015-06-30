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
            //$this->load->library('email');

            $nombre = $_POST['nombre'];
            $asunto = $_POST['asunto'];
            $mail = $_POST['mail'];
            $mensaje = $_POST['mensaje'];
            /*$this->load->library('email');

            $this->email->from($mail, $nombre);
            $this->email->to("smartinmedina@gmail.com"); 
            //$this->email->cc('saint.tripper@gmail.com'); 
            $this->email->bcc('smartinmedina@hotmail.com'); 

            $this->email->subject($asunto);
            $this->email->message($mensaje);  

            $this->email->send();*/

            mail("smartinmedina@hotmail.com", $asunto, $mensaje, "From: webmaster@example.com' . 'Reply-To: webmaster@example.com' . 'X-Mailer: PHP");

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