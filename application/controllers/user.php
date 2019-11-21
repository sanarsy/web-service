<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
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


 function user_list()
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/user";

        $id_divisi = trim($this->session->userdata('id_divisi'));
        $id_user = trim($this->session->userdata('id_user'));

        //notification 

        $sql_listservice = "SELECT COUNT(id_service) AS jml_list_service FROM service WHERE status = 2";
        $row_listservice = $this->db->query($sql_listservice)->row();

        $data['notif_list_service'] = $row_listservice->jml_list_service;

        $sql_approvalservice = "SELECT COUNT(A.id_service) AS jml_approval_service FROM service A 
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN divisi E ON E.id_divisi = D.id_divisi ";
        $row_approvalservice = $this->db->query($sql_approvalservice)->row();

        $data['notif_approval'] = $row_approvalservice->jml_approval_service;

        $sql_assignmentservice = "SELECT COUNT(id_service) AS jml_assignment_service FROM service WHERE status = 3 AND id_teknisi='$id_user'";
        $row_assignmentservice = $this->db->query($sql_assignmentservice)->row();

        $data['notif_assignment'] = $row_assignmentservice->jml_assignment_service;

        //end notification

        $data['link'] = "user/hapus";

        $datauser = $this->model_app->datauser();
        $data['datauser'] = $datauser;
        
        $this->load->view('template', $data);

 }

 function deluser($id_user){ //fungsi delete
    $this->load->model('model_app'); //load model
    $this->model_app->deluser($id_user); //ngacir ke fungsi delTransaksi
    redirect('user/user_list'); //redirect
 
}

  function add()
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_user";

        $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
        $data['id_karyawan'] = "";

//        $data['dd_level'] = $this->model_app->dropdown_level();
 //       $data['id_level'] = "";

        $data['password'] = "";
        $data['photo'] = "";
        $data['id_user'] = "";

        $data['url'] = "user/save";

        $data['flag'] = "add";
    
        $this->load->view('template', $data);

 }

 public function save()
 {
                

    $getkodeuser = $this->model_app->getkodeuser();
    
    $id_user = $getkodeuser;

    $id_karyawan = (trim($this->input->post('id_karyawan')));
    $password = (trim($this->input->post('password')));
    $photo = $this->input->post('photo');
  //  $id_level = (trim($this->input->post('id_level')));

   //  print_r($id_level);
    $data['id_user'] = $id_user;
    $data['nik'] = $id_karyawan;
    $data['password'] = md5($password);
    $data['photo'] = $photo;
   // $data['level'] = $id_level;
    

    $this->db->trans_start();

    try{
		if ($_FILES['photo']['error'] <> 4) {
			
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = 1300+$id_user;

        $this->load->library('upload', $config);
		
	if ( ! $this->upload->do_upload('photo'))
        {
                $error = array('error' => $this->upload->display_errors());    
        }
        else
        {
               // $data = array('upload_data' => $this->upload->data());
                $data['photo'] = $this->upload->data('file_name');
               // print_r($data);
			   // $data['status'] = 1;
                $this->db->insert('user', $data);
                $this->db->trans_complete();

        }
		}else{
		//	$data['status'] = 0;
			$this->db->insert('user', $data);
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
                redirect('user/user_list'); 
            } else 
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
                redirect('user/user_list'); 
            }
        
 }

 private function _do_upload($id)
    {
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 10000; //set max size allowed in Kilobyte
        $config['max_width']            = 10000; // set max width image allowed
        $config['max_height']           = 10000; // set max height allowed
        $config['file_name']            = $id; //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('photo')) //upload and validate
        {
            $data['inputerror'][] = 'photo';
            $data['error_string'][] = 'Upload error: '.$this->upload->display_errors('',''); //show ajax error
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }

        $data['file_name'] = $this->db->escape_str($this->input->post('id_karyawan'));
        return $this->upload->data('file_name');
    }

 function edit($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/form_user1";

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

        $sql = "SELECT * FROM user WHERE id_user = '$id'";
        $row = $this->db->query($sql)->row();

        $data['url'] = "user/update";
            
        $data['dd_karyawan'] = $this->model_app->dropdown_karyawan();
        $data['id_karyawan'] = $row->nik;

    //    $data['dd_level'] = $this->model_app->dropdown_level();
     //   $data['id_level'] = $row->level;

        $data['password'] = $row->password;
        $data['photo'] = "";
        $data['id_user'] = $id;

        $data['flag'] = "edit";

        $this->load->view('template', $data);

 }

 function update()
 {
	$id_karyawan = (trim($this->input->post('id_karyawan')));
    $id_user = (trim($this->input->post('id_user')));
	$password = (trim($this->input->post('password')));
 //   $id_level = (trim($this->input->post('id_level')));
	$photo = (trim($this->input->post('photo')));
	
	$sql = "SELECT * FROM user WHERE id_user = '$id_user'";
    $row = $this->db->query($sql)->row();
	
	$data['id_user'] = $id_user;
	$data['password'] = md5($password);
//    $data['level'] = $id_level;
	$data['photo'] = $photo;
//	$status = FALSE;
	try{
		if ($_FILES['photo']['error'] <> 4) {
			
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;
        $config['file_name']            = 1300+$id_user;

        $this->load->library('upload', $config);
		
	if ( ! $this->upload->do_upload('photo'))
        {
				$x=$row->photo;
                $error = array('error' => $this->upload->display_errors());
				redirect(site_url('user/edit/'.$x));
        }
        else
        {
               // $data = array('upload_data' => $this->upload->data());
			    $file=$row->photo;
				if(file_exists('uploads/'.$file)){unlink('uploads/'.$file);}
                $data['photo'] = $this->upload->data('file_name');
				//$data['file_name'] = $this->db->escape_str($this->input->post('id_informasi'));
				
               // print_r($data);
				//$data['status'] = 1;
                $this->db->where('id_user', $id_user);
				$this->db->update('user', $data);
				$this->db->trans_complete();

        }
		
		}else{
			
			//$data['status'] = 0;
			$this->db->where('id_user', $id_user);
			$this->db->update('user', $data);
			$this->db->trans_complete();
		}
    }catch (Exception $e) {
      var_dump($e->getMessage());
    }
	
	if ($status == FALSE)
	{
		$this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
		</div>");
		redirect('user/user_list');		
	}
	else {
		 
		$this->session->set_flashdata("msg", "<div class='alert bg-danger' role='alert'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data gagal tersimpan.
		</div>");
		redirect('user/user_list'); 
	}


 }
 
 

    
}
