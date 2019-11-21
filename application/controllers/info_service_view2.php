<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_service_view2 extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('info2');


        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
    }

 function view_service2()
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/info_service_view2";

        $id_divisi = trim($this->session->userdata('id_divisi'));
        $id_user = trim($this->session->userdata('id_user'));

        
        $id_service_info = $_GET['id_service'];
    //    $tgl_awal = $_GET['tanggal_awal'];
    //    $tgl_akhir = $_GET['tanggal_akhir'];         

        
		
		// Data diambil dari model //

		//DATALIST_service
		$datalist_service = $this->info2->datalist_service2($id_service_info);
	    $data['datalist_service'] = $datalist_service;
        
        $this->load->view('template', $data);

 }

 
}
