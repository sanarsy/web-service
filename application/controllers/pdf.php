<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

 	function __construct(){
	parent::__construct();
	$this->load->model('model_app','',TRUE);
	$this->load->library('fpdf/fpdf');    
	}
	
	public function kartu($id_service){

		
		$sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, A.id_service, A.reported,
				A.tanggal_solved, A.id_service, A.problem_detail,
				A.tanggal, A.category, (D.nama) as ina, (F.nama) AS nama_teknisi, G.nama_jabatan, H.nama_divisi,
				C.nama_barang, (C.keterangan) as ket, C.jenis
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
				LEFT JOIN barang C ON C.id_barang = A.id_barang
                LEFT JOIN karyawan F ON F.nik = E.nik 
				LEFT JOIN jabatan G ON G.id_jabatan = D.id_jabatan
				LEFT JOIN divisi H ON H.id_divisi = D.id_divisi
                WHERE A.id_service = '$id_service'";	

        $row = $this->db->query($sql)->row();
		
		$pdf = new FPDF();
	//buka file
		$pdf->Open();
	// disable oto page break
		$pdf->SetAutoPageBreak(false);
		$pdf->AddPage();
//==================================================================================================================================//
			
	//$blog = $this->model_app->get_blog();
	//$data['blog'] = $blog;
	//$response = array();
		
	    // print_r('');
        // setting jenis font yang akan digunakan
		$pdf->SetFont('Times','B',14);       
		$pdf->Cell(190,5,'PT. XYZ',0,1,'C');
		$pdf->SetFont('Times','B',9);
		
		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,3,'',0,1);

 		$pdf->SetFont('Times','',10);
 		$pdf->Cell(1,6,'');
 		$pdf->Cell(30,6,'No. Nota Service',0,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(50,6,$row->id_service,0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(25,6,'Tanggal',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(30,6,date('d-m-Y H:i:s', strtotime($row->tanggal)),0,0);
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',10);
 		$pdf->Cell(1,6,'');
 		$pdf->Cell(30,6,'Nama',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(50,6,$row->ina,0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(25,6,'Jenis Barang',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(30,6,$row->jenis,0,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',10);
 		$pdf->Cell(1,6,'');
 		$pdf->Cell(30,6,'Divisi',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->nama_divisi,0,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',10);
 		$pdf->Cell(1,6,'');
 		$pdf->Cell(30,6,'Jabatan',0,0);
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(5,6,':',0,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->nama_jabatan,0,0);
		
		$pdf->Cell(1,6,'',0,1);	
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(1,6,'');
 		$pdf->Cell(185,6,'## Detail Permasalahan',1,0);
		
		$x = $row->problem_detail;
		
		
		
	/*	if($row->tanggal_proses == "0000-00-00 00:00:00")
		{
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,'Belum Dikerjakan',1,0);
		}
		else
		{
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,date('d-m-Y H:i:s', strtotime($row->tanggal_proses)),1,0);
		}	
 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Request Solved',1,0);
		if($row->tanggal_solved == "0000-00-00 00:00:00")
		{
 		$pdf->SetFont('Arial','',8);
		$pdf->Cell(130,6,'Masih Prosess',1,0);
		}
		else 
		{
		$pdf->SetFont('Arial','',8);
		$pdf->Cell(130,6,date('d-m-Y H:i:s', strtotime($row->tanggal_solved)),1,0);	
		}
		*/
		// Break ============================================================//
		
		
		
		
		$pdf->Cell(10,35,'',0,1);
		$pdf->SetFont('Times','',9);       
		$pdf->Cell(60,4,'Pekalongan :',0,0);
		$pdf->Cell(36,4,'Limpung :',0,0);
		$pdf->Cell(55,4,'Batang :',0,0);
		$pdf->Cell(50,4,'Pekalongan :',0,0);
		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',9);       
		$pdf->Cell(60,4,'Jl. Ra Kartini No.67 Pekalongan',0,0);
		$pdf->Cell(36,4,'Jl. Sempu Raya Limpung',0,0);
		$pdf->Cell(55,4,'Jl. Dr wahidin No. 24 Kauman Batang',0,0);
		$pdf->Cell(50,4,'Jl. Raya Pekalongan No. 47',0,0);
		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',9);       
		$pdf->Cell(60,4,'(200M Sebelah Utara Pekalongan Grogolan)',0,0);
		$pdf->Cell(36,4,'(Depan Garasi Persada)',0,0);
		$pdf->Cell(55,4,'(Sebelah Timur RSUD Kalisari Batang)',0,0);
		$pdf->Cell(50,4,'(Sebelah Pasar Mbribik)',0,0);
		$pdf->Cell(10,4,'',0,1);
		$pdf->SetFont('Times','',9);       
		$pdf->Cell(60,4,'Telp.(0285) 420292 / 087710155370',0,0);
		$pdf->Cell(36,4,'Telp.(0285) 4468010',0,0);
		$pdf->Cell(55,4,'Telp.(0285) 4495194 / 08771015 5360',0,0);
		$pdf->Cell(50,4,'Pekalongan',0,0);	
	
		$pdf->Output();	
//return $row->result();

	}

}