<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wd_history_view extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('laporan');

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
    }

function view_history($id)
 {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/history/wd_history_view";

        $id_cabang = trim($this->session->userdata('id_cabang'));
        $id_user = trim($this->session->userdata('id_user'));

        
        $id_history_lap = $this->input->get('id_history');
        $tgl_awal = $this->input->get('tanggal_awal');
        $tgl_akhir = $this->input->get('tanggal_akhir');         

		
		// Data diambil dari model //

		//DATALIST_TICKET
		$datalist_history = $this->laporan->datalist_history($id_history_lap, $tgl_awal, $tgl_akhir);
	    $data['datalist_history'] = $datalist_history;
        
        $this->load->view('template', $data);

 }
 
}
