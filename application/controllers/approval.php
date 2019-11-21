<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller {

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

 function approval_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/approval";

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

        //end notification
        
        $data['link'] = "approval_kabag/hapus";       

        $dataapproval = $this->model_app->dataapproval($id_divisi);
	    $data['dataapproval'] = $dataapproval;
        

        $this->load->view('template', $data);

 }

  function approval_no($service)
 {
 	
    $data['status'] = 0;

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Request tidak disetujui";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;

  
    $this->db->trans_start();

 	$this->db->where('id_history', $service);
 	$this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

 	$this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('approval/approval_list');   
            } else 
            {
                
                redirect('approval/approval_list');   
            }

	
 }

 function approval_reaction($service)
 {

     $data['status'] = 1;

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Request dikembalikan ke posisi belum di setujui";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;

  
    $this->db->trans_start();

    $this->db->where('id_history', $service);
    $this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('approval/approval_list');   
            } else 
            {
                
                redirect('approval/approval_list');   
            }

 }

  function approval_yes($service)
 {
   
    $data['status'] = 2;

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $tracking['id_history'] = $service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Request disetujui";
    $tracking['deskripsi'] = "";
    $tracking['id_user'] = $id_user;
  
    $this->db->trans_start();

    $this->db->where('id_history', $service);
    $this->db->update('service', $data);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

     if ($this->db->trans_status() === FALSE)
            {
               
                redirect('approval/approval_list');   
            } else 
            {
                
                redirect('approval/approval_list');   
            }
    
 }

 function hapus()
 {
 	$id = $_POST['id'];

 	$this->db->trans_start();

 	$this->db->where('id_jabatan', $id);
 	$this->db->delete('jabatan');

 	$this->db->trans_complete();
	
 }

 function approval()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_jabatan";

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

        //end notification

	    $data['url'] = "jabatan/save";			
		$data['id_jabatan'] = "";		
		$data['nama_jabatan'] = "";
        

        $this->load->view('template', $data);

 }

 



    
}
