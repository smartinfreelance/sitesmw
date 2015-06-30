<?php
class Stock extends CI_Controller {
    function index()
    {
        if($this->session->userdata('idstock')){
            $this->load->view(
                    'main', 
                    array(
                        "modulo" => 'stock',
                        "pagina" => 'index'
                    )
                );
        }else{
            $this->goToLogin();
        }

    }

    function goToLogin()
    {
        $this->load->view(
            'main', 
            array(
                "modulo" => 'login',
                "pagina" => 'index',
                "idproducto" => 'stock'
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