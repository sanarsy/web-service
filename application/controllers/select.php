<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        
    }


function select_divisi()
 {

 	   $id_divisi = $this->input->post('id_divisi');
		
		if(trim($id_divisi) == ""){
			$data['dd_divisi'] = $this->model_app->dropdown_divisi('ea');
			$data['id_divisi'] = "";
		}else{
			$data['dd_divisi'] = $this->model_app->dropdown_divisi($id_divisi);
			$data['id_divisi'] = "";
		}
		
		$this->load->view('combo/select_divisi',$data);	

 }

 function select_view_job()
 {
		$id_teknisi = $this->input->post('id_teknisi');
		$sql = "SELECT A.progress, A.status, A.id_service, D.nama, A.tanggal, B.nama_kategori, A.problem_detail, A.category
                                   FROM service A 
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                   WHERE A.id_teknisi = '$id_teknisi'";
								   
	     $data['dataassigment'] = $this->db->query($sql);
		
		$this->load->view('combo/select_view_job',$data);	

 }

  function select_kategori()
 {

 	   $id_kategori = $this->input->post('id_kategori');
		
		if(trim($id_kategori) == ""){
			$data['dd_kategori'] = $this->model_app->dropdown_kategori('ea');
			$data['id_kategori'] = "";
		}else{
			$data['dd_kategori'] = $this->model_app->dropdown_kategori($id_kategori);
			$data['id_kategori'] = "";
		}
		
		$this->load->view('combo/select_kategori',$data);	

 }



    
}
