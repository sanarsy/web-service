<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

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


 function barang_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/barang";

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
        
        $data['link'] = "barang/hapus";

        $databarang = $this->model_app->datalist_barang();
	    $data['databarang'] = $databarang;
		
		//$databarang2 = $this->model_app->databarang2();
	    //$data['databarang2'] = $databarang2;
		
		$data['url'] = "barang/save";
			
		$data['id_barang'] = "";
		
		//$data['dd_barang'] = $this->model_app->dropdown_brg();
		$data['id_barang'] = "";
		
		$data['jenis'] = "";
		$data['tgl_po'] = "";
		$data['no_po'] = "";
		$data['nama_barang'] = "";
		$data['merk'] = "";
		$data['harga'] = "";
		$data['stok_in'] = "";
		$data['reported'] = "";
		$data['waktu_input'] = "";
		$data['status'] = "";
		$data['keterangan'] = "";
		
        $this->load->view('template', $data);

 }
 
 function delbarang($id_barang){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delbarang($id_barang); //ngacir ke fungsi delTransaksi
    redirect('barang/barang_list'); //redirect
 
}


 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_barangnew";

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
        $cari_data = "select A.nik, A.nama, B.nama_divisi FROM karyawan A
        							   LEFT JOIN divisi B ON B.id_divisi = A.id_divisi
        							   WHERE A.nik = '$id_user'";
        $row = $this->db->query($cari_data)->row();
		
        $data['id_user'] = $id_user;		
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;
		

	    $data['url'] = "barang/save";
			
		$data['id_barang'] = "";		
		$data['jenis'] = "";
		$data['tgl_po'] = "";
		$data['no_po'] = "";
		$data['merk'] = "";
		$data['harga'] = "";
		$data['nama_barang'] = "";
		$data['stok_in'] = "";
		$data['keterangan'] = "";
		$data['reported'] = "";
		$data['waktu_input'] = "";
		$data['status'] = "";
			

        $this->load->view('template', $data);

 }

 function save()
 {
	$getkodebarang = $this->model_app->getkodebarang();
	
	$barang = $getkodebarang;
	
	$id_user = (trim($this->input->post('id_user')));
	$jenis = strtoupper(implode(", ", $_POST['jenis']));
 	$nama_barang = (trim($this->input->post('nama_barang')));
	$tgl_po = date("Y-m-d",strtotime($this->input->post('tgl_po')));
	$no_po = ($this->input->post('no_po'));
	$merk = ($this->input->post('merk'));
	$harga = ($this->input->post('harga'));
	$stok_in = (trim($this->input->post('stok_in')));
	$keterangan = (trim($this->input->post('keterangan')));
	$reported = (trim($this->input->post('reported')));
	$waktu_input = $time = date("Y-m-d  H:i:s");
	$status = (trim($this->input->post('status')));
		

	$data['id_barang'] = $barang;		
	$data['jenis'] = $jenis;
	$data['nama_barang'] = $nama_barang;
	$data['tgl_po'] = $tgl_po;
	$data['no_po'] = $no_po;
	$data['merk'] = $merk;
	$data['harga'] = $harga;
	$data['stok_in'] = 1;
	$data['keterangan'] = $keterangan;
	$data['reported'] = $id_user;
	$data['waktu_input'] = $waktu_input;
	$data['status'] = 1;
	
	$id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $barang;
    $history['status'] = "insert";
	$history['deskripsi'] = "input new barang";
	$history['id_user'] = $id_user;
	
	
 	$this->db->trans_start();

 	$this->db->insert('barang', $data);
	$this->db->insert('tracking', $history);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('barang/barang_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('barang/barang_list');	
			}
		 }


 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_barangnew";

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
        $cari_data = "select A.nik, A.nama, B.nama_divisi FROM karyawan A
        							   LEFT JOIN divisi B ON B.id_divisi = A.id_divisi
        							   WHERE A.nik = '$id_user'";
        $row = $this->db->query($cari_data)->row();
		
        $data['id_user'] = $id_user;		
        $data['nama'] = $row->nama;
        $data['divisi'] = $row->nama_divisi;

        $sql = "SELECT * FROM barang WHERE id_barang = '$id'";
		$row = $this->db->query($sql)->row();
		
		$data['url'] = "barang/update";
			
		$data['id_barang'] = $id;	
		$data['nama_barang'] = $row->nama_barang;
		$data['jenis'] = $row->jenis;
		$data['stok_in'] = $row->stok_in;
		$data['merk'] = $row->merk;
		$data['harga'] = $row->harga;
		$data['reported'] = $row->reported;
		$data['status'] = $row->status;
		$data['tgl_po'] = $row->tgl_po;
		$data['no_po'] = $row->no_po;
		$data['waktu_input'] = $row->waktu_input;
		$data['keterangan'] = $row->keterangan;
		

        $this->load->view('template', $data);

 }

 function update()
 {

 	$id_barang = (trim($this->input->post('id_barang')));
	$id_user = (trim($this->input->post('id_user')));
	$jenis = strtoupper(implode(", ", $_POST['jenis']));
 	$nama_barang = (trim($this->input->post('nama_barang')));
	$tgl_po = date("Y-m-d",strtotime($this->input->post('tgl_po')));
	$no_po = ($this->input->post('no_po'));
	$merk = ($this->input->post('merk'));
	$harga = ($this->input->post('harga'));
	$stok_in = (trim($this->input->post('stok_in')));
	$keterangan = (trim($this->input->post('keterangan')));
	$reported = (trim($this->input->post('reported')));
	$waktu_input = $time = date("Y-m-d  H:i:s");
	$status = (trim($this->input->post('status')));
		

	$data['id_barang'] = $id_barang;		
	$data['jenis'] = $jenis;
	$data['nama_barang'] = $nama_barang;
	$data['tgl_po'] = $tgl_po;
	$data['no_po'] = $no_po;
	$data['merk'] = $merk;
	$data['harga'] = $harga;
	$data['stok_in'] = $stok_in;
	$data['keterangan'] = $keterangan;
	$data['reported'] = $id_user;
	$data['waktu_input'] = $waktu_input;
	$data['status'] = $status;
	
	$id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_barang;
    $history['status'] = "update";
	$history['deskripsi'] = "update barang";
	$history['id_user'] = $id_user;

 	$this->db->trans_start();

 	$this->db->where('id_barang', $id_barang);
 	$this->db->update('barang', $data);
	
	$this->db->insert('tracking', $history);

 	$this->db->trans_complete();

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('barang/barang_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('barang/barang_list');	
			}

 }



    
}
