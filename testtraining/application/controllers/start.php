<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Start extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('startcrud');
    }

	public function index()
	{
		$s = $this->startcrud->startit();
		$this->load->view('welcome_message', array("dato" => $s));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */