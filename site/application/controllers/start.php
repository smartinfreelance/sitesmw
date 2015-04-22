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
}
?>