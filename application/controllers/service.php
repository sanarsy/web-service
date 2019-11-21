<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
function delService($id_service){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delService($id_service); //ngacir ke fungsi delTransaksi
    redirect('myservice/myservice_list'); //redirect
 
}
	

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_service";

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
		
		
		$sql_assignmentservice = "SELECT COUNT(id_service) AS jml_assignment_service FROM service WHERE status = 3";
        $row_assignmentservice = $this->db->query($sql_assignmentservice)->row();
        $data['notif_assignment2'] = $row_assignmentservice->jml_assignment_service;
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 1";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification
        
        $id_user = trim($this->session->userdata('id_user'));
        $cari_data = "select A.nik, A.nama, B.nama_divisi FROM karyawan A
        							   LEFT JOIN divisi B ON B.id_divisi = A.id_divisi
        							   WHERE A.nik = '$id_user'";
        $row = $this->db->query($cari_data)->row();
		
        $data['id_service'] = "";
        $data['id_user'] = $id_user;		
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;
		$data['category'] = "";
		
		$data['dd_kondisi'] = $this->model_app->dropdown_kondisi();
		$data['id_kondisi'] = "";
		
		$data['dd_barang'] = $this->model_app->dropdown_barang2();
		$data['id_barang'] = "";
		
		$data['tanggal_service'] = "";
		$data['alamat'] = "";
		
		$data['email'] = "";
		$data['info_tambahan'] = "";
		$data['telp'] = "";
		
		$data['spesialis'] = "";
		$data['problem_detail'] = "";
		$data['skomputer'] = "";
		$data['sparepart'] = "";
		$data['status'] = "";
		$data['progress'] = "";
		
		$data['url'] = "service/save";

		$data['flag'] = "add";
		
        $this->load->view('template', $data);

 }

 function save()
 {

 	$getkodeservice = $this->model_app->getkodeservice();
	
	$service = $getkodeservice;

 	$id_user = (trim($this->input->post('id_user')));
 	$tanggal = $time = date("Y-m-d  H:i:s");
	//$category = implode(", ", $_POST['category']);
 	$problem_detail = (trim($this->input->post('problem_detail')));
	$skomputer = (trim($this->input->post('skomputer')));
	$id_barang = (trim($this->input->post('id_barang')));
	$sparepart = (trim($this->input->post('sparepart')));
	
 	$id_teknisi = (trim($this->input->post('id_teknisi')));
	$tanggal_service = date("Y-m-d",strtotime($this->input->post('tanggal_service')));
    $id_kondisi = (trim($this->input->post('id_kondisi')));
 	
 	$data['id_service'] = $service;
 	$data['reported'] = $id_user;
 	$data['tanggal'] = $tanggal;
	$data['id_barang'] = $id_barang;
 	$data['problem_detail'] = $problem_detail;
	
	$data['skomputer'] = $skomputer;
	$data['sparepart'] = $sparepart;
	$data['tanggal_service'] = $tanggal_service;
 	$data['id_teknisi'] = $id_teknisi;
	
	$data['id_kondisi'] = $id_kondisi;
 	$data['status'] = 1;
 	$data['progress'] = 0;

 	$tracking['id_history'] = $service;
 	$tracking['tanggal'] = $tanggal;
 	$tracking['status'] = "insert request";
 	$tracking['deskripsi'] = "insert request new";
 	$tracking['id_user'] = $id_user;

 	$this->db->trans_start();

 	$this->db->insert('service', $data);
 	$this->db->insert('tracking', $tracking);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('myservice/myservice_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('myservice/myservice_list');		
			}
		
 }

 function edit($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_service";

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

        $id_user = trim($this->session->userdata('id_user'));

        $cari_data = "SELECT A.status, A.id_service, DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.id_kondisi, A.skomputer, A.sparepart, 
									A.category, D.nik, D.nama, E.nama_divisi, F.nama_jabatan, A.problem_detail, A.id_barang,
									A.id_kondisi, DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc									
                                   FROM service A 
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                   LEFT JOIN divisi E ON E.id_divisi = D.id_divisi
                                   LEFT JOIN jabatan F ON F.id_jabatan = D.id_jabatan
                                   LEFT JOIN kondisi G ON G.id_kondisi = A.id_kondisi
                                   LEFT JOIN tracking H ON H.id_history = A.id_service
                                   WHERE A.id_service = '$id'";

        $row = $this->db->query($cari_data)->row();

        $data['id_service'] = $id;
        $data['id_user'] = $id_user;
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;		
    //  $data['category'] = $row->category;
	
		$data['dd_barang'] = $this->model_app->dropdown_barang2();
		$data['id_barang'] = $row->id_barang;
		
		$data['problem_detail'] = $row->problem_detail;
		$data['nama_divisi'] = $row->nama_divisi;
		$data['nama_jabatan'] = $row->nama_jabatan;
		$data['skomputer'] = $row->skomputer;
		$data['sparepart'] = $row->sparepart;
		$data['tanggal_service'] = $row->tgl_svc;
        $data['status'] = "";
        $data['progress'] = "";

        $data['url'] = "service/update";

        $data['flag'] = "edit";
    
        $this->load->view('template', $data);

 }

 function update()
 { 

   
    $id_user = (trim($this->input->post('id_user')));
    $tanggal = $time = date("Y-m-d  H:i:s");
	$tanggal_service = date("Y-m-d",strtotime($this->input->post('tanggal_service')));
    $id_service = (trim($this->input->post('id_service')));
    $id_barang = (trim($this->input->post('id_barang')));
	//$category = implode(", ", $_POST['category']);
    $problem_detail = (trim($this->input->post('problem_detail')));
	$skomputer = (trim($this->input->post('skomputer')));
	$sparepart = (trim($this->input->post('sparepart')));
    $id_teknisi = (trim($this->input->post('id_teknisi')));
    $id_kondisi = (trim($this->input->post('id_kondisi')));
    
    
    $data['reported'] = $id_user;
    $data['tanggal'] = $tanggal;
	$data['tanggal_service'] = $tanggal_service;
    //$data['category'] = $category;
    $data['id_teknisi'] = $id_teknisi;
	$data['id_barang'] = $id_barang;
    $data['problem_detail'] = $problem_detail;
    $data['id_kondisi'] = $id_kondisi;
	$data['skomputer'] = $skomputer;
	$data['sparepart'] = $sparepart;
    $data['status'] = 1;
    $data['progress'] = 0;

    $tracking['id_history'] = $id_service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "update service";
    $tracking['deskripsi'] = "update request ";
    $tracking['id_user'] = $id_user;

    $this->db->trans_start();
    $this->db->where('id_service', $id_service);
    $this->db->update('service', $data);
    
    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
                </div>");
                redirect('myservice/myservice_list'); 
            } else 
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
                redirect('myservice/myservice_list');     
            }
			
        
 }
   
}
