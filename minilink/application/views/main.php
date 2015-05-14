<?php 
	header('Content-type: text/html; charset=utf-8');
	$this->load->view('top');
    $this->load->view($pagina);
	$this->load->view('bottom');
     
?>