<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_request_view extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('laporan2');


        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
    }

 function view_laporan($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/lap_request_view";

        $id_divisi = trim($this->session->userdata('id_divisi'));
        $id_user = trim($this->session->userdata('id_user'));

        
        $id_divisi_lap = $_GET['id_divisi'];
        $tgl_awal = $_GET['tanggal_awal'];
        $tgl_akhir = $_GET['tanggal_akhir'];         

        
		
		// Data diambil dari model //

		//DATALIST_service
		$datalist_service = $this->laporan2->datalist_service($id_divisi_lap, $tgl_awal, $tgl_akhir);
	    $data['datalist_service'] = $datalist_service;
        
        $this->load->view('template', $data);

 }

 
}
