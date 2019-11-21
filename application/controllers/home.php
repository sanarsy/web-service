<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct(){
        parent::__construct();
        

        if(!$this->session->userdata('id_user'))
       {
        $this->session->set_flashdata("msg", "<div class='alert alert-info'>
       <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
       <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
       </div>");
        redirect('login');
        }
        
    }

    
function index()
    {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/dashboard";

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
		
		$sql_userservice2 = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 4";
        $row_userservice2 = $this->db->query($sql_userservice2)->row();
        $data['notif_usert2'] = $row_userservice2->jml_user_service;

		$sql_userservice3 = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 6";
        $row_userservice3 = $this->db->query($sql_userservice3)->row();
        $data['notif_usert3'] = $row_userservice3->jml_user_service;
        //end notification

        $sql_service = "SELECT COUNT(id_service) AS jml_service FROM service";
		$row_service = $this->db->query($sql_service)->row();

		$sql_user = "SELECT COUNT(id_user) AS jml_user FROM user";
		$row_user = $this->db->query($sql_user)->row();

		$sql_karyawan = "SELECT COUNT(nik) AS jml_karyawan FROM karyawan";
		$row_karyawan = $this->db->query($sql_karyawan)->row();

		$sql_teknisi = "SELECT COUNT(id_teknisi) AS jml_teknisi FROM teknisi";
		$row_teknisi = $this->db->query($sql_teknisi)->row();


		$sql_service_solved = "SELECT COUNT(id_service) AS jml_service_solved FROM service where status = 6";
		$row_service_solved = $this->db->query($sql_service_solved)->row();

		$sql_service_process = "SELECT COUNT(id_service) AS jml_service_process FROM service where status = 4";
		$row_service_process = $this->db->query($sql_service_process)->row();


        $sql_service_app_int = "SELECT COUNT(id_service) AS jml_service_app_int FROM service where status = 1";
		$row_service_app_int = $this->db->query($sql_service_app_int)->row();

		$sql_service_app_tek = "SELECT COUNT(id_service) AS jml_service_app_tek FROM service where status = 3";
		$row_service_app_tek = $this->db->query($sql_service_app_tek)->row();

		//KEPUASAN USER

		

			
		$data['jml_service'] = $row_service->jml_service;
		$data['jml_user'] = $row_user->jml_user;
		$data['jml_karyawan'] = $row_karyawan->jml_karyawan;
		$data['jml_teknisi'] = $row_teknisi->jml_teknisi;


		$precent_service_solved = ($row_service_solved->jml_service_solved)?($row_service_solved->jml_service_solved / $row_service->jml_service) * 100:0;

		$precent_service_process = ($row_service_process->jml_service_process)?($row_service_process->jml_service_process / $row_service->jml_service) * 100:0;
		
		$precent_service_app_int = ($row_service_app_int->jml_service_app_int)?($row_service_app_int->jml_service_app_int / $row_service->jml_service) * 100:0;

		$precent_service_app_tek = ($row_service_app_tek->jml_service_app_tek)?($row_service_app_tek->jml_service_app_tek / $row_service->jml_service) * 100:0;

		$data['jml_service_solved'] = $precent_service_solved;
		$data['jml_service_process'] = $precent_service_process;	
		$data['jml_service_app_int'] = $precent_service_app_int;
		$data['jml_service_app_tek'] = $precent_service_app_tek;


		$precent_service_app_tek = ($row_service_app_tek->jml_service_app_tek=0)?($row_service_app_tek->jml_service_app_tek / $row_service->jml_service) * 100:0;


		$sql_feedback = "SELECT COUNT(id_feedback) AS jml_feedback FROM history_feedback";
		$row_feedback = $this->db->query($sql_feedback)->row();

		$sql_feedback_positiv = "SELECT COUNT(id_feedback) AS jml_feedback_positiv FROM history_feedback WHERE feedback =1";
		$row_feedback_positiv = $this->db->query($sql_feedback_positiv)->row();

		$sql_feedback_negativ = "SELECT COUNT(id_feedback) AS jml_feedback_negativ FROM history_feedback WHERE feedback =0";
		$row_feedback_negativ = $this->db->query($sql_feedback_negativ)->row();

		if($row_feedback_positiv->jml_feedback_positiv == 0)
		{
		$data['jml_feedback_positiv'] = 0;
		}
		else
		{
		$data['jml_feedback_positiv'] = $row_feedback_positiv->jml_feedback_positiv / $row_feedback->jml_feedback * 100;	
		}	

		if($row_feedback_negativ->jml_feedback_negativ == 0)
		{
		$data['jml_feedback_negativ'] = 0;
		}
		else
		{
		$data['jml_feedback_negativ'] = $row_feedback_negativ->jml_feedback_negativ / $row_feedback->jml_feedback * 100;	
		}	
       

        $this->load->view('template', $data);
    }

    
}
