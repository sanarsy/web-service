<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stbarang extends CI_Controller {

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
	
 function stbarang_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/stbarang";


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

        $data['link'] = "stbarang/hapus";

        $datastbarang = $this->model_app->stbarang_list();
	    $data['datastbarang'] = $datastbarang;
        
        $this->load->view('template', $data);

 }	
	
	
function delStbarang($id_st){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delStbarang($id_st); //ngacir ke fungsi delTransaksi
    redirect('stbarang/stbarang_list'); //redirect
 
}
	

 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_stbarang";

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
		
        $data['id_st'] = "";
        $data['id_user'] = $id_user;		
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;
		
		$data['dd_barang'] = $this->model_app->dropdown_barang();
		$data['id_barang'] = "";

        $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		$data['id_karyawan'] = "";
		
		$data['tgl_st'] = "";
		$data['keterangan'] = "";
		$data['reported'] = "";
		$data['waktu_input'] = "";
		$data['status'] = "";
		
		$data['url'] = "stbarang/save";

		$data['flag'] = "add";
		
        $this->load->view('template', $data);

 }

 function save()
 {

 	$getkodestbarang = $this->model_app->getkodestbarang();
	$stbarang = $getkodestbarang;

 	$id_user = (trim($this->input->post('id_user')));
 	$waktu_input = $time = date("Y-m-d  H:i:s");
	$id_barang = (trim($this->input->post('id_barang')));
	$id_karyawan = (trim($this->input->post('id_karyawan')));
	$tgl_st = date("Y-m-d",strtotime($this->input->post('tgl_st')));
    $keterangan = (trim($this->input->post('keterangan')));
	$status = (trim($this->input->post('status')));
 	
 	$data['id_st'] = $stbarang;
 	$data['reported'] = $id_user;
 	$data['tgl_st'] = $tgl_st;
	$data['id_barang'] = $id_barang;
 	$data['id_karyawan'] = $id_karyawan;
	
	$data['keterangan'] = $keterangan;
	$data['status'] = 1;
	$data['waktu_input'] = $waktu_input;
	
	$tanggal = $time = date("Y-m-d  H:i:s");
 	$tracking['id_history'] = $stbarang;
 	$tracking['tanggal'] = $tanggal;
 	$tracking['status'] = "insert ";
 	$tracking['deskripsi'] = "insert serah terima barang";
 	$tracking['id_user'] = $id_user;
	
	
	//$brg['id_barang'] = $id_barang;
	//$brg['status'] = 2;
	
 	$this->db->trans_start();

 	$this->db->insert('st_barang', $data);
 	$this->db->insert('tracking', $tracking);
	//$this->db->where('id_barang', $id_barang);
	//$this->db->update('barang', $brg);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('stbarang/stbarang_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('stbarang/stbarang_list');		
			}
		
 }

 function edit($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_stbarang";

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

        $cari_data = "SELECT A.status, DATE_FORMAT(A.tgl_st, '%d-%m-%Y %H:%i:%s')as tgl_st, 
									A.id_barang, A.id_karyawan, A.keterangan, A.id_st,
									DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input, A.reported,
									B.nama_barang, B.jenis, B.merk, (B.keterangan) as ket,
									C.nama, 
									D.nama_divisi,
									E.nama_jabatan
									FROM st_barang A 
									LEFT JOIN barang B ON B.id_barang = A.id_barang
									LEFT JOIN karyawan C ON C.nik = A.id_karyawan
									LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
									LEFT JOIN jabatan E ON E.id_jabatan = C.id_jabatan								   
                                   WHERE A.id_st = '$id' and A.id_barang = '$id'";

        $row = $this->db->query($cari_data)->row();

        $data['id_st'] = $id;
        $data['id_user'] = $id_user;
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;
		
		$data['dd_barang'] = $this->model_app->dropdown_barang();
		$data['id_barang'] = $row->id_barang;

        $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
		$data['id_karyawan'] = $row->id_karyawan;
		
        $data['tgl_st'] = $row->tgl_st;	
		$data['keterangan'] = $row->keterangan;
		$data['ket'] = $row->ket;
		$data['reported'] = $row->reported;
		$data['waktu_input'] = $row->waktu_input;
        $data['status'] = "";

        $data['url'] = "st_barang/update";

        $data['flag'] = "edit";
    
        $this->load->view('template', $data);

 }

 function update()
 { 
    $id_user = (trim($this->input->post('id_user'))); 
	$id_st = (trim($this->input->post('id_st')));
	$waktu_input = $time = date("Y-m-d  H:i:s");
 	$id_barang = (trim($this->input->post('id_barang')));
	$id_karyawan = (trim($this->input->post('id_karyawan')));
	$tgl_st = date("Y-m-d",strtotime($this->input->post('tgl_st')));
    $keterangan = (trim($this->input->post('keterangan')));
	$status = (trim($this->input->post('status')));
 	
 	$data['id_st'] = $id_st;
 	$data['reported'] = $id_user;
 	$data['tgl_st'] = $tgl_st;
	$data['id_barang'] = $id_barang;
 	$data['id_karyawan'] = $id_karyawan;
	
	$data['keterangan'] = $keterangan;
	$data['status'] = 1;
	$data['waktu_input'] = $waktu_input;


    $tracking['id_history'] = $id_st;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "update";
    $tracking['deskripsi'] = "update penyerahan barang";
    $tracking['id_user'] = $id_user;

    $this->db->trans_start();
    $this->db->where('id_st', $id_st);
    $this->db->update('st_barang', $data);    
    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
                </div>");
                redirect('stbarang/stbarang_list'); 
            } else 
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
                redirect('stbarang/stbarang_list');     
            }
			
        
 }
 
 function stbarang_list2()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/stbarang2";


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

        $data['link'] = "stbarang/hapus";

        $datastbarang = $this->model_app->stbarang_list2();
	    $data['datastbarang'] = $datastbarang;
		
        $this->load->view('template', $data);

 }
	function approval_user($id_st)
 {	
	
	$data['status'] = 2;
	
	$id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");
    
	$tracking['id_history'] = $id_st;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "update";
    $tracking['deskripsi'] = "update penyerahan barang";
    $tracking['id_user'] = $id_user;	
	
	$brg['id_barang'] = $id_barang;
	$brg['status'] = 2;
  
    $this->db->trans_start();

    $this->db->where('id_st', $id_st);
    $this->db->update('st_barang', $data);
	
	$this->db->where('id_barang', $id_barang);
	$this->db->update('barang', $brg);

    $this->db->insert('tracking', $tracking);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE)
            {
               
                redirect('stbarang/stbarang_list2');   
            } else 
            {
                
                redirect('stbarang/stbarang_list2');   
            }

 }
 
   
}
