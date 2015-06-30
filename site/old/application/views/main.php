<?php 
	header('Content-type: text/html; charset=utf-8');
	$this->load->view('top',$modulo);
?>

<?php if($this->session->flashdata('done')) { ?>	
	<p class="msg done"><?php echo $this->session->flashdata('done'); ?></p>
<?php } ?>

<?php if($this->session->flashdata('error')) { ?>	
	<p class="msg error"><?php echo $this->session->flashdata('error'); ?></p>
<?php } ?>    

<?php

    $this->load->view($modulo . '/' . $pagina);
	$this->load->view('bottom',$modulo);
     
?>