<?php
class Start extends CI_Controller {
    function index()
    {
        $this->load->view(
                'main', 
                array(
                    "modulo" => 'home',
                    "pagina" => 'index'
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
}
?>