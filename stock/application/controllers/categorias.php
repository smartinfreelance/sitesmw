<?php

class Categorias extends CI_Controller
{
    function Categorias()
    {
        parent::__construct();
        //$this->load->model('loginCRUD');
        $this->load->model('categoriasCRUD');
    }

    function index($pagina_nro = 0)
    {
        //$categorias = $this->categoriasCRUD->getCategorias();

        $cant_rows = 2;
        $controller = "categorias";
        $total_rows = $this->categoriasCRUD->getCantCategorias();

        $linksPaginacion = $this->smartin->getPaginacion($pagina_nro,$cant_rows,$total_rows,$controller); 

        $desde_row = $pagina_nro * $cant_rows;
        $categorias = $this->categoriasCRUD->getXCategorias($desde_row,$cant_rows);
        
        $this->load->view(
            'main', 
            array(
                "modulo" => 'categorias',
                "pagina" => 'panel',
                "categorias" => $categorias,
                "links" => $linksPaginacion
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