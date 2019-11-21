<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_service_user extends CI_Controller {

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


 function service_list_user()
 {

 	    $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/list_service_user";

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
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 1";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification

        $datalist_service = $this->model_app->datalist_service();
	    $data['datalist_service'] = $datalist_service;
        
        $this->load->view('template', $data);
 }


 function pilih_teknisi($id)
 {
        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/pilih_teknisi";

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
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 1";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification

        $sql = "SELECT A.status, D.nama, A.id_service, A.tanggal, A.category, A.skomputer, A.sparepart,
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                WHERE A.id_service = '$id'";

        $row = $this->db->query($sql)->row();

    //    $id_kategori = $row->id_kategori;

        $data['url'] = "list_service/assignment"; 

    //    $data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        $data['id_teknisi'] = "";
            
        $data['id_service'] = $id;       
        $data['tanggal'] = $row->tanggal;
        $data['category'] = $row->category;
        $data['reported'] = $row->nama;
        
        $this->load->view('template', $data);

 }


 function assignment()
 {

    $id_service = (trim($this->input->post('id_service')));
    $id_teknisi = (trim($this->input->post('id_teknisi')));

    $id_user = trim($this->session->userdata('id_user'));
    $tanggal = $time = date("Y-m-d  H:i:s");

    $data['id_teknisi'] = $id_teknisi;
    $data['status'] = 3;
    

    $tracking['id_history'] = $id_service;
    $tracking['tanggal'] = $tanggal;
    $tracking['status'] = "Pemilihan Teknisi";
    $tracking['deskripsi'] = "service DIBERIKAN KEPADA TEKNISI";
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
                redirect('list_service/service_list'); 
            } else 
            {
                $this->session->set_flashdata("msg", "<div class='alert bg-success' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <svg class='glyph stroked empty-message'><use xlink:href='#stroked-empty-message'></use></svg> Data tersimpan.
                </div>");
                redirect('list_service/service_list'); 
            }

 }

 function view_progress_teknisi($id)
 {

        $data['header'] = "header/header";
        $data['navbar'] = "navbar/navbar";
        $data['sidebar'] = "sidebar/sidebar";
        $data['body'] = "body/progress_teknisi";

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
		
		$sql_userservice = "SELECT COUNT(id_service) AS jml_user_service FROM service WHERE reported='$id_user' AND status = 1";
        $row_userservice = $this->db->query($sql_userservice)->row();
        $data['notif_usert'] = $row_userservice->jml_user_service;

        //end notification

         $sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, 
				F.nama AS nama_teknisi, D.nama, A.id_service, A.tanggal, A.category, A.skomputer, A.sparepart
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                LEFT JOIN karyawan F ON F.nik = E.nik 
                WHERE A.id_service = '$id'";

        $row = $this->db->query($sql)->row();

        //$id_kategori = $row->id_kategori;

       // $data['dd_teknisi'] = $this->model_app->dropdown_teknisi($id_kategori);
        $data['id_teknisi'] = "";
            
        $data['id_service'] = $id;  
        $data['nama_teknisi'] = $row->nama_teknisi;       
        $data['tanggal'] = $row->tanggal;
        $data['category'] = $row->category;
        $data['reported'] = $row->nama;
        $data['progress'] = $row->progress;
        $data['tanggal_proses'] = $row->tanggal_proses;
        $data['tanggal'] = $row->tanggal;
        $data['tanggal_solved'] = $row->tanggal_solved;
		$data['skomputer'] = $row->skomputer;
		$data['sparepart'] = $row->sparepart;

        //TRACKING service
        $data_trackingservice = $this->model_app->data_trackingservice($id);
        $data['data_trackingservice'] = $data_trackingservice;

        
        $this->load->view('template', $data);

 }
 
 
 
 
 // tidak dipakai==================================================//

 public function pdflistservice()
    {
    
    $datalist_service = $this->model_app->datalist_service();
    $data['datalist_service'] = $datalist_service;
    
    
    ob_start();
        $content = $this->load->view('body/pdflistservice',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'en');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Report_ppic.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    
    }
    
}
