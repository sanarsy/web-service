<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pdf extends CI_Controller {

 	function __construct(){
	parent::__construct();
	$this->load->model('model_app','',TRUE);
	$this->load->library('fpdf/fpdf');    
	}
	
	public function kartu($id_service){

		//$sql = "SELECT A.status, A.progress,A.tanggal, A.tanggal_solved, A.tanggal_proses, 
		//		A.tanggal_solved, A.id_service, A.problem_detail, A.tanggal, A.category, D.nama, F.nama AS nama_teknisi, G.nama_jabatan
        //        FROM service A 
        //        LEFT JOIN karyawan D ON D.nik = A.reported 
        //        LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
        //        LEFT JOIN karyawan F ON F.nik = E.nik
		//		LEFT JOIN jabatan  G ON G.id_jabatan = F.id_jabatan
        //        WHERE A.id_service ='$id_service'";
		
		$sql = "SELECT A.status, A.progress, A.tanggal,  A.tanggal_proses, A.tanggal_solved, A.id_service, A.reported,
				A.tanggal_solved, A.id_service, A.problem_detail, A.tanggal, A.category, D.nama, F.nama AS nama_teknisi, G.nama_jabatan, H.nama_divisi
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
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
		$pdf->SetFont('Times','B',12);       
		$pdf->Cell(70,7,'PT.BATANG ALUM INDUSTRIE',0,1,'C');
		$pdf->SetFont('Times','',8);
		$pdf->Cell(120,6,'');
		$pdf->Cell(27,4,'No. Dok: FR.IT.0004',1,0);
		$pdf->Cell(23,4,'Edisi/Revisi : I/04',1,0);
		$pdf->Cell(17,4,'Hal : 1 dari 1',1,0);
		
		$pdf->Cell(10,25,'',0,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'JOB REQUEST',0,1,'C');
		
// // ================================= Bagian Header =================================================//
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
//		$pdf->Cell(10,4,'',0,1);

//		$pdf->SetFont('Arial','B',10);
//		$pdf->Cell(4,6,'');
//		$pdf->Cell(40,6,'No. Form',1,0);
//		$pdf->SetFont('Arial','B',10);
//		$pdf->Cell(140,6,$row->id_service,1,0);
		
 		// Memberikan space kebawah agar tidak terlalu rapat
		
 		$pdf->Cell(10,6,'',0,1);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Nama',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->nama,1,0);
		
 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Job Title',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->nama_jabatan,1,0);
		
 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Departemen',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->nama_divisi,1,0);
		
// // ================================= Bagian Date =================================================//
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,15,'',0,1);

		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetFillColor(210,221,242);
		$pdf->Rect(25, 82, 170, 6, 'DF');
 		$pdf->SetFont('Arial','B',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(170,6,'DATE',1,0);
		
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Request Date',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,date('d-m-Y H:i:s', strtotime($row->tanggal)),1,0);
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Request Prosess',1,0);
		if($row->tanggal_proses == "0000-00-00 00:00:00")
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
		
// 	// ================================= Bagian Job Type =================================================//		
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,15,'',0,1);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetFillColor(210,221,242);
		$pdf->Rect(25, 115, 170, 6, 'DF');
 		$pdf->SetFont('Arial','B',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(170,6,'JOB REQUEST',1,0);
		
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Job Type',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,6,$row->category,1,0);
		
			
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,60,'',1,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(130,60,'',1,0);
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,'','',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(40,6,'Job Description',0,0);
 		$pdf->SetFont('Arial','',8);
 		$pdf->MultiCell(130,6,$row->problem_detail,0);
		
// //==================================================================================================================//try	
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,60,'',0,1);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetFillColor(210,221,242);
		$pdf->Rect(25, 193, 45, 6, 'DF');
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(45,6,'Request By :',1,0,'C');
 		$pdf->Cell(80,6,'');
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetFillColor(210,221,242);
		$pdf->Rect(150, 193, 45, 6, 'DF');
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,6,'Solved By :',1,0,'C');
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,6,'',0,1);

        $pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(45,35,'',1,0);
 		$pdf->Cell(80,6,'');
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,35,'',1,0);
		
// 		// Memberikan space kebawah agar tidak terlalu rapat
 		$pdf->Cell(10,'','',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(45,6,'',0,0,'C');
 		$pdf->Cell(80,6,'');
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,6,'',0);
		
 		$pdf->Cell(10,22,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(45,6,$row->nama,0,0,'C');
 		$pdf->Cell(80,6,'');
		if($row->tanggal_solved == "0000-00-00 00:00:00")
		{
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,6,'',0,0,'C');
		}
		else
		{
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,6,$row->nama_teknisi,0,0,'C');
		}	
		
 		$pdf->Cell(10,7,'',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(45,6,'',1,0);
 		$pdf->Cell(80,6,'');
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(45,6,'',1,0);
		
		$pdf->Cell(10,'','',0,1);

 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(15,6,'');
 		$pdf->Cell(10,6,'Date :',0,0);
		$pdf->Cell(35,6,date('d-m-Y', strtotime($row->tanggal)),0,0);
 		$pdf->Cell(80,6,'');
		if ($row->tanggal_solved == "0000-00-00 00:00:00")
		{
 		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(10,6,'Date :',0,0);
		$pdf->Cell(35,6,'Masih Prosess',0,0);
		}
		else
		{	
		$pdf->SetFont('Arial','',8);
 		$pdf->Cell(10,6,'Date :',0,0);
		$pdf->Cell(35,6,date('d-m-Y', strtotime($row->tanggal_solved)),0,0);
		}
//==================================== try =============================================================//


		$pdf->Output();	
//return $row->result();

	}

}