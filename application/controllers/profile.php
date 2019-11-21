<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

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

    
function view()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/profile";

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

       $id = $this->session->userdata('id_user');


        $sql = 
        "SELECT A.nik, A.nama, A.alamat, A.jk, A.level, C.nama_jabatan, C.nama_jabatan, D.nama_divisi, E.nama_divisi, F.id_user  
        FROM KARYAWAN A 
        LEFT JOIN user B ON B.nik = A.nik 
        LEFT JOIN jabatan C ON C.id_jabatan = A.id_jabatan 
        LEFT JOIN divisi D ON D.id_divisi = A.id_divisi 
        LEFT JOIN divisi E ON E.id_divisi = D.id_divisi
		LEFT JOIN user F ON F.nik = A.nik
		WHERE A.nik ='$id'";

        $row = $this->db->query($sql)->row();

        //general
        $data['nik'] = $row->nik;
        $data['nama'] = $row->nama;
        $data['alamat'] = $row->alamat;
        $data['jk'] = $row->jk;
		$data['user'] = $row->id_user;

        //info jabatan
        $data['jabatan'] = $row->nama_jabatan;
        $data['divisi'] = $row->nama_divisi;
        $data['divisi'] = $row->nama_divisi;
        $data['level'] = $row->level;



	
        $this->load->view('template', $data);
    }

    
}
