<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teknisi extends CI_Controller {

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


 function teknisi_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/teknisi";

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

        $data['link'] = "teknisi/hapus";

        $datateknisi = $this->model_app->datateknisi();
	    $data['datateknisi'] = $datateknisi;
        
        $this->load->view('template', $data);

 }

function delteknisi($id_teknisi){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delteknisi($id_teknisi); //ngacir ke fungsi delTransaksi
    redirect('teknisi/teknisi_list'); //redirect
 
}

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_teknisi";

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

 
        $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		$data['id_karyawan'] = "";

		$data['spesialis'] = "";
		$data['id_teknisi'] = "";
		


		$data['url'] = "teknisi/save";

		$data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 function save()
 {

 	$getkodeteknisi = $this->model_app->getkodeteknisi();
	
	$id_teknisi = $getkodeteknisi;

 	$id_karyawan = (trim($this->input->post('id_karyawan')));
 	$spesialis = (trim($this->input->post('spesialis')));

 	$data['id_teknisi'] = $id_teknisi;
 	$data['nik'] = $id_karyawan;
 	$data['spesialis'] = $spesialis;
	
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_teknisi;
    $history['status'] = "insert";
	$history['deskripsi'] = "insert new teknisi";
	$history['id_user'] = $id_user;
 	

 	$this->db->trans_start();

 	$this->db->insert('teknisi', $data);
	$this->db->insert('tracking', $history);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('teknisi/teknisi_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('teknisi/teknisi_list');	
			}
		
 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_teknisi";

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

        $sql = "SELECT * FROM teknisi WHERE id_teknisi = '$id'";
		$row = $this->db->query($sql)->row();

		$data['url'] = "teknisi/update";
			
		$data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		$data['id_karyawan'] = $row->nik;
		$data['spesialis'] = $row->spesialis;

		$data['id_teknisi'] = $id;

		$data['flag'] = "edit";

        $this->load->view('template', $data);

 }

 function update()
 {

 	$id_teknisi = (trim($this->input->post('id_teknisi')));
 	$spesialis = (trim($this->input->post('spesialis')));
	
	
	$data['id_teknisi'] = $id_teknisi;
 	$data['spesialis'] = $spesialis;
	
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_teknisi;
    $history['status'] = "update";
	$history['deskripsi'] = "update new teknisi";
	$history['id_user'] = $id_user;
 

 	$this->db->trans_start();

 	$this->db->where('id_teknisi', $id_teknisi);
 	$this->db->update('teknisi', $data);
	$this->db->update('tracking', $history);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('teknisi/teknisi_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('teknisi/teknisi_list');	
			}

 }


    
}
