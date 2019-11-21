<?php
Class Laporanpdf2 extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
		$this->load->model('model_app');
    }
    
    function index(){
        $this->load->library('pdf');
		$this->load->model('model_lap');
		$data['service'] = $this->model_lap->get_all();
		
		$this->load->view('laporanpdf2',$data);
       
    }
}
?>