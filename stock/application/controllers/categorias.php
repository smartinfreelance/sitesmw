<?php

class Categorias extends CI_Controller
{
    function Categorias()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('categoriasCRUD');
    }

    function index()
    {
        $categorias = $this->categoriasCRUD->getCategorias();
        $this->load->view(
            'main', 
            array(
                "modulo" => 'categorias',
                "pagina" => 'panel',
                "categorias" => $categorias
            )
        );
    }

    function addCategoria(){
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'add'
                        ));

    }

    function confirmAddCategoria(){
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('nombre', 'Nombre', 'is_unique[categorias.nombre]');
        if (($this->form_validation->run() == FALSE)){
            $this->addCategoria();            
        }else{
            $this->categoriasCRUD->addCategoria($_POST['nombre']);

            $this->index();

        }

    }

    function editCategoria($idCategoria){
        $categoria = $this->categoriasCRUD->getCategoria($idCategoria);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'edit',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));        
    }

    function confirmEditCategoria(){
        $idCategoria = $_POST['id'];
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');

        if (($this->form_validation->run() == FALSE)){
            $categoria = $this->productosCRUD->getProducto($idCategoria);

            $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'edit',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));


        }else{
            $this->categoriasCRUD->editCategoria($idCategoria,$_POST['nombre']);

            $this->index();

        }
        
    }

    function eliminarCategoria($idCategoria){
        $categoria = $this->categoriasCRUD->getCategoria($idCategoria);
        $this->load->view(
                        'main',
                        array(
                            "modulo" => 'categorias',
                            "pagina" => 'delete',
                            "categoria" => $categoria[0],
                            "idCategoria" => $idCategoria
                        ));        
    }

    function confirmEliminarCategoria(){
        $idCategoria = $_POST['id'];
        $this->categoriasCRUD->eliminarCategoria($idCategoria);
        $this->index();        
    }

    function intenta_desloggear()
    {
        $datos=array("idusuario"=> "","nombre"=> "","usuario"=> "","rol"=> "");
        $this->session->unset_userdata($datos);
        $this->index();
    }
    
}