<?php

class Laporan extends CI_Model{
    // function __construct(){
    //     parent::__construct();
    // }

    //  ================= AUTOMATIC CODE ==================
   
//    public function datalist_service($id_cabang_lap, $tgl_awal, $tgl_akhir)
	public function datalist_history($id_history_lap, $tgl_awal, $tgl_akhir)
    {
     
    if(!empty($id_history_lap)){
		
            $query = $this->db->query("SELECT A.id_history, A.id_tracking, A.deskripsi, A.status, A.id_user,
										DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tanggal,
										B.nama				
										FROM tracking A 
										LEFT JOIN karyawan B ON B.nik = A.id_user                                   
										WHERE  
										A.id_history='".$id_history_lap."'
										AND	
										date(A.tanggal) 
										BETWEEN '".date('Y-m-d', strtotime($tgl_awal))."' AND '".date('Y-m-d', strtotime($tgl_akhir))."'");

        }
    else{

            $query = $this->db->query("SELECT A.id_history, A.id_tracking, A.deskripsi, A.status, A.id_user,
										DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tanggal,
										B.nama				
										FROM tracking A 
										LEFT JOIN karyawan B ON B.nik = A.id_user                                   
										WHERE 
										date(A.tanggal) 
										BETWEEN '".date('Y-m-d', strtotime($tgl_awal))."' AND '".date('Y-m-d', strtotime($tgl_akhir))."'");

		}

        return $query->result();
    }

}