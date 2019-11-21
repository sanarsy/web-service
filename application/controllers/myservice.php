<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myservice extends CI_Controller {

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


 function myservice_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/myservice";

        $id_divisi = trim($this->session->userdata('id_divisi'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listservice = "SELECT COUNT(id_service) AS jml_list_service FROM service WHERE status = 2";
        $row_listservice = $this->db->query($sql_listservice)->row();
        $data['notif_list_service'] = $row_listservice->jml_list_service;

        $sql_approvalservice = "SELECT COUNT(A.id_service) AS jml_approval_service FROM service A 
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN divisi E ON E.id_divisi = D.id_divisi WHERE E.id_divisi = $id_divisi AND status = 1";
        $row_approvalservice = $this->db->query($sql_approvalservice)->row();
        $data['notif_approval'] = $row_approvalservice->jml_approval_service;

        $sql_assignmentservice = "SELECT COUNT(id_service) AS jml_assignment_service FROM service WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentservice = $this->db->query($sql_assignmentservice)->row();
        $data['notif_assignment'] = $row_assignmentservice->jml_assignment_service;
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 1";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification

        $id = trim($this->session->userdata('id_user'));
        $datamyservice = $this->model_app->datamyservice($id);
	    $data['datamyservice'] = $datamyservice;

        $data['link'] = "service/hapus";
        
        $this->load->view('template', $data);
 }


 function myservice_detail($id)
 {
		$data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/progress_teknisi";

         $sql = "SELECT A.status, A.progress, A.tanggal, A.tanggal_solved, A.tanggal_proses, A.skomputer, A.sparepart, 
				A.tanggal_solved, A.id_service, A.problem_detail, A.tanggal_service, A.category, D.nama, F.nama AS nama_teknisi
                FROM service A
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                LEFT JOIN karyawan F ON F.nik = E.nik 
                WHERE A.id_service = '$id'";

        $row = $this->db->query($sql)->row();

		//$id_kategori = $row->id_kategori;

		$data['dd_teknisi'] = $this->model_app->dropdown_teknisi();
        $data['id_teknisi'] = "";
            
        $data['id_service'] = $id;  
        $data['nama_teknisi'] = $row->nama_teknisi;       
        $data['tanggal'] = $row->tanggal;
        $data['category'] = $row->category;
		$data['problem_detail'] = $row->problem_detail;
		
		$data['skomputer'] = $row->skomputer;
		$data['sparepart'] = $row->sparepart;
        $data['reported'] = $row->nama;
        $data['progress'] = $row->progress;
        $data['tanggal_proses'] = $row->tanggal_proses;
        $data['tanggal'] = $row->tanggal;
        $data['tanggal_solved'] = $row->tanggal_solved;

        //TRACKING service
        $data_trackingservice = $this->model_app->data_trackingservice($id);
        $data['data_trackingservice'] = $data_trackingservice;

        
        $this->load->view('template', $data);
 }


 function feedback_yes($id_service, $id_teknisi)
 {

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $data['feedback'] = 1;
    $data['reported'] = $id_user;
    $data['id_service'] = $id_service;


    $sql_teknisi = "SELECT * FROM teknisi WHERE id_teknisi = '$id_teknisi'";
    $row = $this->db->query($sql_teknisi)->row();

    $data2['point'] = $row->point + 1;
  
    $this->db->trans_start();

    $this->db->insert('history_feedback', $data);

    $this->db->where('id_teknisi', $id_teknisi);
    $this->db->update('teknisi', $data2);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('myservice/myservice_list');   
            } else 
            {
                
                redirect('myservice/myservice_list');   
            }



 }

 function feedback_no($id_service, $id_teknisi)
 {

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $data['feedback'] = 0;
    $data['reported'] = $id_user;
    $data['id_service'] = $id_service;

    $sql_teknisi = "SELECT * FROM teknisi WHERE id_teknisi = '$id_teknisi'";
    $row = $this->db->query($sql_teknisi)->row();

    $data2['point'] = $row->point - 1;
  
    $this->db->trans_start();

    $this->db->insert('history_feedback', $data);

    $this->db->where('id_teknisi', $id_teknisi);
    $this->db->update('teknisi', $data2);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('myservice/myservice_list');   
            } else 
            {
                
                redirect('myservice/myservice_list');   
            }
 }
    
//=============================================	   try     ==================================================== //


  function approval_user($service)
 {
   
    $data['status'] = 7;

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Diterima User";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;
    $this->db->trans_start();
    $this->db->where('id_service', $service);
    $this->db->update('service', $data);
    $this->db->insert('tracking', $tracking);
    $this->db->trans_complete();
     if ($this->db->trans_status() === FALSE)
            {
                redirect('myservice/myservice_list');   
            } else 
            {   
                redirect('myservice/myservice_list');   
            }
 }

// ============================================== try =========================================================//

	


}
