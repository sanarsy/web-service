<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

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

 function informasi_list()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/informasi";

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

        $data['link'] = "informasi/hapus";
        
        $datainformasi = $this->model_app->datainformasi();
	    $data['datainformasi'] = $datainformasi;
        
        $this->load->view('template', $data);

 }

 function delinformasi($id_informasi){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->delinformasi($id_informasi); //ngacir ke fungsi delTransaksi
    redirect('informasi/informasi_list'); //redirect
 
}


 function add()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_informasi";

         $id_divisi = trim($this->session->userdata('id_divisi'));
        $id = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listservice = "SELECT COUNT(id_service) AS jml_list_service FROM service WHERE status = 2";
        $row_listservice = $this->db->query($sql_listservice)->row();

        $data['notif_list_service'] = $row_listservice->jml_list_service;

        $sql_approvalservice = "SELECT COUNT(A.id_service) AS jml_approval_service FROM service A 
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN divisi E ON E.id_divisi = D.id_divisi WHERE E.id_divisi = $id_divisi AND status = 1";
        $row_approvalservice = $this->db->query($sql_approvalservice)->row();

        $data['notif_approval'] = $row_approvalservice->jml_approval_service;

        $sql_assignmentservice = "SELECT COUNT(id_service) AS jml_assignment_service FROM service WHERE status = 3 AND id_teknisi='$id'";
        $row_assignmentservice = $this->db->query($sql_assignmentservice)->row();

        $data['notif_assignment'] = $row_assignmentservice->jml_assignment_service;

        //end notification

        $data['id_informasi'] ="";
        $data['subject'] ="";
        $data['pesan'] ="";
		$data['file_informasi'] ="";

        $data['url'] = "informasi/save";
       
        $this->load->view('template', $data);

 }

  

 function save()
 {
 	$id_user = trim($this->session->userdata('id_user'));
	$subject =(trim($this->input->post('subject')));
 	$pesan = (trim($this->input->post('pesan')));
	$file_informasi = (trim($this->input->post('file_informasi')));
 	$tanggal = $time = date("Y-m-d  H:i:s");

 	$data['subject'] = $subject;
 	$data['pesan'] = $pesan;	
 	$data['id_user'] = $id_user;
 	$data['tanggal'] = $tanggal;
 	
 	$this->db->trans_start();
 	
	
	try{
		if ($_FILES['file_informasi']['error'] <> 4) {
			
        $config['upload_path']          = './uploads/news/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = 1300+$id_informasi;

        $this->load->library('upload', $config);
		
	if ( ! $this->upload->do_upload('file_informasi'))
        {
                $error = array('error' => $this->upload->display_errors());    
        }
        else
        {
               // $data = array('upload_data' => $this->upload->data());
                $data['file_informasi'] = $this->upload->data('file_name');
               // print_r($data);
				$data['status'] = 1;
                $this->db->insert('informasi', $data);
                $this->db->trans_complete();

        }
		}else{
			$data['status'] = 0;
			$this->db->insert('informasi', $data);
            $this->db->trans_complete();
		}
    }catch (Exception $e) {
      var_dump($e->getMessage());
    }	
	
 	if ($this->db->trans_status() === false)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('informasi/informasi_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data  tersimpan.
			    </div>");
				redirect('informasi/informasi_list');	
			}
		
 }
 
 private function _do_upload($id)
    {
        $config['upload_path']          = 'uploads/news/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = $id; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_informasi')) //upload and validate
        {
            $data['inputerror'][] = 'file_informasi';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        $data['file_name'] = $this->db->escape_str($this->input->post('id_informasi'));
        return $this->upload->data('file_name');
    }

 function edit($id)
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_informasi";

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

        $sql = "SELECT * FROM informasi WHERE id_informasi = '$id'";
		$row = $this->db->query($sql)->row();
		//$data['unlink']= unlink("./uploads/news/$row->file_informasi");

		$data['id_informasi'] = $row->id_informasi;
        $data['subject'] = $row->subject;
        $data['pesan'] = $row->pesan;
		$data['file_informasi'] = $row->file_informasi;
		$data['url'] = "informasi/update";			

        $this->load->view('template', $data);
 }

 function update()
 {
 	$id_informasi = (trim($this->input->post('id_informasi')));
 	$id_user = trim($this->session->userdata('id_user'));
 	$subject = (trim($this->input->post('subject')));
 	$pesan = (trim($this->input->post('pesan')));
	$file_informasi = (trim($this->input->post('file_informasi')));
 	$tanggal = $time = date("Y-m-d  H:i:s");
	
	$sql = "SELECT * FROM informasi WHERE id_informasi = '$id_informasi'";
	$row = $this->db->query($sql)->row();

 	$data['subject'] = $subject;
 	$data['pesan'] = $pesan;
	$data['file_informasi'] = $file_informasi;
 	$data['id_user'] = $id_user;
 	$data['tanggal'] = $tanggal;

 	$this->db->trans_start();
	try{
		if ($_FILES['file_informasi']['error'] <> 4) {
			
        $config['upload_path']          = './uploads/news/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = 1300+$id_informasi;

        $this->load->library('upload', $config);
		
	if ( ! $this->upload->do_upload('file_informasi'))
        {
				$x=$row->id_informasi;
                $error = array('error' => $this->upload->display_errors());
				redirect(site_url('informasi/edit/'.$x));
        }
        else
        {
               // $data = array('upload_data' => $this->upload->data());
			    $file=$row->file_informasi;
				if(file_exists('uploads/news/'.$file)){unlink('uploads/news/'.$file);}
                $data['file_informasi'] = $this->upload->data('file_name');
				//$data['file_name'] = $this->db->escape_str($this->input->post('id_informasi'));
				
               // print_r($data);
				$data['status'] = 1;
                $this->db->where('id_informasi', $id_informasi);
				$this->db->update('informasi', $data);
				$this->db->trans_complete();

        }
		
		}else{
			
			$data['status'] = 0;
			$this->db->where('id_informasi', $id_informasi);
			$this->db->update('informasi', $data);
			$this->db->trans_complete();
		}
    }catch (Exception $e) {
      var_dump($e->getMessage());
    }

 	

 	if ($this->db->trans_status() === FALSE)
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
			    </div>");
				redirect('informasi/informasi_list');	
			} else 
			{
				$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
			    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			    <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
			    </div>");
				redirect('informasi/informasi_list', 'refresh');	
			}

 }


    
}
