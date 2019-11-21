<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myassignment extends CI_Controller {

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


 function myassignment_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/myassignment";

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
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user'";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification
        
        
        $datamyassignment = $this->model_app->datamyassignment($id_user);
	    $data['datamyassignment'] = $datamyassignment;
        
        $this->load->view('template', $data);
 }

 function terima($service)
 {

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Diproses oleh teknisi";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;

    $data['status'] = 4;
    $data['tanggal_proses'] = $tanggal;
  
    $this->db->trans_start();

    $this->db->where('id_service', $service);
    $this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

     if ($this->db->trans_status() === FALSE)
            {
               
                redirect('myassignment/myassignment_list');   
            } else 
            {
                
                redirect('myassignment/myassignment_list');   
            }
 }

 function pending($service)
 {
    $data['status'] = 5;

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Pending oleh teknisi";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;
  
    $this->db->trans_start();

    $this->db->where('id_service', $service);
    $this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

     if ($this->db->trans_status() === FALSE)
            {
               
                redirect('myassignment/myassignment_list');   
            } else 
            {
                
                redirect('myassignment/myassignment_list');   
            }
 }


 function service_detail($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/up_progress";

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
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user'";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification

        $sql = "SELECT A.progress, A.status, D.nama, A.category, A.id_service, A.tanggal, A.skomputer, A.sparepart
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                WHERE A.id_service = '$id'";

        $row = $this->db->query($sql)->row();
    //    $id_kategori = $row->id_kategori;
        $data['url'] = "Myassignment/up_progress";
		$data['dd_teknisi'] = $this->model_app->dropdown_teknisi();
        $data['id_teknisi'] = "";            
        $data['id_service'] = $id;  
        $data['progress'] = $row->progress;       
        $data['tanggal'] = $row->tanggal;
        $data['category'] = $row->category;
        $data['reported'] = $row->nama;
		$data['skomputer'] = $row->skomputer;
		$data['sparepart']=	$row->sparepart;	
        
        $this->load->view('template', $data);

 }


 function up_progress()
 {

    
    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $service = (trim($this->input->post('id_service')));

    $progress = (trim($this->input->post('progress')));
	
	$skomputer = (trim($this->input->post('skomputer')));
	$sparepart = (trim($this->input->post('sparepart')));
	

    if($progress==100)
    {
        $data['status'] = 6;
        $data['tanggal_solved'] = $tanggal;
    }
    else
    {
        $data['status'] = 4;
    }

    $deskripsi_progress = (trim($this->input->post('deskripsi_progress')));
	
    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Up Progress To ".$progress." %";
    $tracking['deskripsi'] = $deskripsi_progress;
    $tracking['id_user'] = $id_user;

    $data['progress'] = $progress;
	$data['skomputer'] = $skomputer;
	$data['sparepart'] = $sparepart;
  
    $this->db->trans_start();

    $this->db->where('id_service', $service);
    $this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('myassignment/myassignment_list');   
            } else 
            {
                
                redirect('myassignment/myassignment_list');  
            }


 }
    
}
