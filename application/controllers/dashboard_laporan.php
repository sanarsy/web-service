<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_laporan extends CI_Controller {

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

 function view_laporan($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/dashboard_laporan";

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

        $sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, A.id_service, A.skomputer, A.sparepart,
				A.tanggal, A.problem_detail, A.category, D.nama, 
				F.nama AS nama_teknisi, G.nama_jabatan, H.nama_divisi
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                LEFT JOIN karyawan F ON F.nik = E.nik 
				LEFT JOIN jabatan G ON G.id_jabatan = D.id_jabatan
				LEFT JOIN divisi H ON H.id_divisi = D.id_divisi
                WHERE A.id_service = '$id'";
        $row = $this->db->query($sql)->row();

       // $id_kategori = $row->id_kategori;

		//$data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        $data['id_teknisi'] = "";
            
        $data['id_service'] = $id;  
        $data['nama_teknisi'] = $row->nama_teknisi;       
        $data['tanggal'] = $row->tanggal;
		$data['nama_jabatan'] = $row->nama_jabatan;
		$data['category'] = $row->category;
		$data['problem_detail'] = $row->problem_detail;
		$data['nama_divisi'] = $row->nama_divisi;
        $data['reported'] = $row->nama;
        $data['progress'] = $row->progress;
        $data['tanggal_proses'] = $row->tanggal_proses;
        $data['tanggal'] = $row->tanggal;
        $data['tanggal_solved'] = $row->tanggal_solved;
		$data['skomputer'] = $row->skomputer;
		$data['sparepart'] = $row->sparepart;

        //TRACKING service
        $data_trackingservice = $this->model_app->data_trackingservice($id);
        $data['data_trackingservice'] = $data_trackingservice;

        
        $this->load->view('template', $data);

 }
}
