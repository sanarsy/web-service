<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_app');
        
    }

    
function index()
    {
        $data = "";

        $this->load->view('login', $data);
    }

//A1
  function login_akses()
  {
//A2
  	$email = trim($this->input->post('email'));
//A3
  	$password = trim($this->input->post('password'));
//A4 	
	$akses = $this->db->query("select A.id_user, A.nik, A.photo, B.level, B.id_jabatan, B.nama, B.email, C.id_divisi FROM user A 
		LEFT JOIN karyawan B ON B.nik = A.nik
        LEFT JOIN divisi C ON C.id_divisi = B.id_divisi
		WHERE B.email = '".$email."' AND A.password = '".md5($password)."'");
//A5
	print_r($akses);
//A6
    if($akses->num_rows() == 1)
	{
//A7
		foreach($akses->result_array() as $data)
		{
//a8			
			$session['id_user'] = $data['nik'];
//a9			
			$session['nik'] = $data['nik'];
//a10			
			$session['nama'] = $data['nama'];
			
			$session['email'] = $data['email'];
//a11			
			$session['photo'] = $data['photo'];
//a12			
			$session['level'] = $data['level'];
//a13			
			$session['id_jabatan'] = $data['id_jabatan'];
//a14			
			$session['id_divisi'] = $data['id_divisi'];
//a15			
			$this->session->set_userdata($session);
//a16			
		    redirect('home');
//a17			
		}
//a18	
	}
//a19	
	else
	{
//a20					
	$this->session->set_flashdata('result_login', '<br>Nik/Password yang anda masukkan salah.</br>');
//a21	
	            redirect();	
//a22				
	// redirect('login');
	}
//a23
	
  }
//a24

  public function logout() {

  $this->session->sess_destroy();

  redirect('login');
    


}


    
}
