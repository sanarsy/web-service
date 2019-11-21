<?php
class Laporan extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
		$this->load->model('model_app2');
        $this->load->helper('currency_format_helper');
    }

    function index(){
        $data=array(
            'title'=>'Laporan Penjualan',
            'active_laporan'=>'active',
            'data_penjualan'=>$this->model_app2->getAllDataPenjualan(),
        );
        
        $this->session->unset_userdata('id_service');
		
		$data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/v_lap_penjualan";
		$this->load->view('template',$data);

    }

    function cari(){
        $id_service= $this->input->post('id_service');
        $sess_data=array(
            'id_service'=>$id_service
        );
        $this->session->set_userdata($sess_data);
        $data=array(
            'dt_result'=> $this->model_app2->getLapPenjualan($id_service),
            'id_service'=>$this->session->userdata('id_service'),
        );
		$data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/v_result_laporan";
		$this->load->view('template',$data);
        //$this->load->view('body/v_result_laporan',$data);
    }
}
