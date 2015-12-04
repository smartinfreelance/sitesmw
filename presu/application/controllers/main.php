<?php

    class Main extends CI_Controller
    {
        function Main()
        {
            parent::__construct();
            //$this->load->model('loginCRUD');
            //$this->load->model('minilinkCRUD');
        }

        function index()
        {
            //if is not logged in
            $this->load->view("login");
            //else
        }
        function roles_usuarios()
        {
            $roles_usuarios = $this->rolesCRUD->getAll();
            $this->load->view("main", array("modulo" => "rolesUsuarios", "pagina" =>"panel", "roles_usuarios" => $roles_usuarios);
            
        }

        function presupuestos()
        {
            $presupuestos = $this->presupuestosCRUD->getAll();
            $this->load->view("main", array("modulo" => "presupuestos", "pagina" =>"panel", "presupuestos" => $presupuestos);
            
        }

        function categorias_gastos()
        {
            $categoriasGastos = $this->categoriasGastosCRUD->getAll();
            $this->load->view("main", array("modulo" => "categoriasGastos", "pagina" =>"panel", "categoriasGastos" => $categoriasGastos);
            
        }

        function gastos()
        {
            $gastos = $this->gastosCRUD->getAll();
            $this->load->view("main", array("modulo" => "gastos", "pagina" =>"panel", "gastos" => $gastos);
            
        }

        function presupuestos_gastos()
        {
            $presupuestosGastos = $this->presupuestosGastosCRUD->getAll();
            $this->load->view("main", array("modulo" => "presupuestos_gastos", "pagina" =>"panel", "presupuestosGastos" => $presupuestosGastos);
            
        }

        function usuarios()
        {
            $usuarios = $this->rolesCRUD->getAll();
            $this->load->view("main", array("modulo" => "usuarios", "pagina" =>"panel", "usuarios" => $usuarios);
            
        }

        function usuarios_presupuestos()
        {
            $usuariosPresupuestos = $this->usuariosPresupuestosCRUD->getAll();
            $this->load->view("main", array("modulo" => "usuariosPresupuestos", "pagina" =>"panel", "usuariosPresupuestos" => $usuariosPresupuestos);
            
        }


    }
?>