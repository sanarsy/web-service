<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

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


 function karyawan_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/karyawan";


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

        $data['link'] = "karyawan/hapus";

        $datakaryawan = $this->model_app->datakaryawan();
	    $data['datakaryawan'] = $datakaryawan;
        
        $this->load->view('template', $data);

 }

function delkaryawan($nik){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delKaryawan($nik); //ngacir ke fungsi delTransaksi
    redirect('karyawan/karyawan_list'); //redirect
 
}

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_karyawan";

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

        $data['nik'] = "";		
		$data['nama'] = "";
		$data['alamat'] = "";
		$data['email'] = "";
		
			
		$data['dd_jk'] = $this->model_app->dropdown_jk();
		$data['id_jk'] = "";

        $data['dd_jabatan'] = $this->model_app->dropdown_jabatan();
		$data['id_jabatan'] = "";

		$data['dd_divisi'] = $this->model_app->dropdown_divisi();
		$data['id_divisi'] = "";
				
		$data['dd_level'] = $this->model_app->dropdown_level();
        $data['level'] = "";
		
		$data['url'] = "karyawan/save";

		$data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 function save()
 {

 	$getkodekaryawan = $this->model_app->getkodekaryawan();
	
	$nik = $getkodekaryawan;

 	$nama = (trim($this->input->post('nama')));
 	$jk = (trim($this->input->post('id_jk')));
 	$alamat = (trim($this->input->post('alamat')));
	$email = (trim($this->input->post('email')));
	$id_divisi = (trim($this->input->post('id_divisi')));
 	$id_jabatan = (trim($this->input->post('id_jabatan')));
	$level = (trim($this->input->post('level')));
	
 	$data['nik'] = $nik;
 	$data['nama'] = $nama;
 	$data['jk'] = $jk;
 	$data['alamat'] = $alamat;
	$data['email'] = $email;
 	$data['id_divisi'] = $id_divisi;
 	$data['id_jabatan'] = $id_jabatan;
	$data['level'] = $level;
	
	
	$id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $nik;
    $history['status'] = "insert";
	$history['deskripsi'] = "insert karyawan";
	$history['id_user'] = $nik;
	
 	$this->db->trans_start();

 	$this->db->insert('karyawan', $data);
	$this->db->insert('tracking', $history);
	
 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('karyawan/karyawan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('karyawan/karyawan_list');	
			}
		
 }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_karyawan";

        $sql = "SELECT * FROM karyawan A LEFT JOIN jabatan B ON B.id_jabatan = A.id_jabatan
                                               LEFT JOIN divisi C ON C.id_divisi = A.id_divisi
                                               LEFT JOIN divisi D ON D.id_divisi = C.id_divisi WHERE A.nik = '$id'";
		$row = $this->db->query($sql)->row();

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

		$data['url'] = "karyawan/update";
			
		$data['nik'] = $id;		
		$data['nama'] = $row->nama;
		$data['alamat'] = $row->alamat;
		$data['email'] = $row->email;		
		
		$data['dd_jk'] = $this->model_app->dropdown_jk();
		$data['id_jk'] = $row->jk;

		$data['dd_jabatan'] = $this->model_app->dropdown_jabatan();
		$data['id_jabatan'] = $row->id_jabatan;

		$data['dd_divisi'] = $this->model_app->dropdown_divisi($row->id_divisi);
		$data['id_divisi'] = $row->id_divisi;

		$data['dd_divisi'] = $this->model_app->dropdown_divisi();
		$data['id_divisi'] = $row->id_divisi;
		
		$data['dd_level'] = $this->model_app->dropdown_level();
        $data['level'] = $row->level;

		$data['flag'] = "edit";

        $this->load->view('template', $data);

 }

 function update()
 {

 	$nik = (trim($this->input->post('nik')));

 	$nama = (trim($this->input->post('nama')));
 	$jk = (trim($this->input->post('id_jk')));
 	$alamat = (trim($this->input->post('alamat')));
	$email = (trim($this->input->post('email')));
 	$id_divisi = (trim($this->input->post('id_divisi')));
 	$id_jabatan = (trim($this->input->post('id_jabatan')));
 	$id_level = (trim($this->input->post('id_level')));
	$level = (trim($this->input->post('level')));
 	
 	$data['nama'] = $nama;
 	$data['jk'] = $jk;
 	$data['alamat'] = $alamat;
	$data['email'] = $email;
 	$data['id_divisi'] = $id_divisi;
 	$data['id_jabatan'] = $id_jabatan;
	$data['level'] = $level;
	
	$id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $nik;
    $history['status'] = "update";
	$history['deskripsi'] = "update karyawan";
	$history['id_user'] = $id_user;
	
 	$this->db->trans_start();

 	$this->db->where('nik', $nik);
 	$this->db->update('karyawan', $data);
	$this->db->insert('tracking', $history);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('karyawan/karyawan_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('karyawan/karyawan_list');	
			}

 }


    
}
