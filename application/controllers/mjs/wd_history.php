<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wd_history extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');


        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
    }


 function history_wd()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/history/wd_history";

        $id_cabang = trim($this->session->userdata('id_cabang'));
        $id_user = trim($this->session->userdata('id_user'));

		$sql = "SELECT A.id_history, A.id_tracking, A.deskripsi, A.status, A.id_user,
				DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tanggal,
				B.nama				
                FROM tracking A 
				LEFT JOIN karyawan B ON B.nik = A.id_user
                ";

        $row = $this->db->query($sql)->row();
		
        $data['id_history'] = $row->id_history;  
        $data['tanggal'] = $row->tanggal;       
        $data['id_tracking'] = $row->id_tracking;
        $data['deskripsi'] = $row->deskripsi;
        $data['status'] = $row->status;
        $data['id_user'] = $row->id_user;		
		
        
        $this->load->view('template', $data);
 }
    
}
