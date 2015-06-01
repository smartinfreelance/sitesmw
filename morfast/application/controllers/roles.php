<?php

    class Roles extends CI_Controller
    {
        function Roles()
        {
            parent::__construct();
            //$this->load->model('loginCRUD');
            $this->load->model('rolesCRUD');
        }

        function index()
        {
            $roles = $this->rolesCRUD->getRoles();
            $this->load->view(
                'main', 
                array(
                    "modulo" => 'roles',
                    "pagina" => 'panel',
                    "roles" => $roles
                )
            );
        }

        
        
    }
?>