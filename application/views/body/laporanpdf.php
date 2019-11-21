<?php
		$this->load->library('fpdf');
        //$pdf = new FPDF('P','mm','A4');
		 $this->fpdf->FPDF("P","cm","A4");
        // membuat halaman baru
       $this->fpdf->AddPage();
        // setting jenis font yang akan digunakan
       $this->fpdf->SetFont('Times','B',12);
        // mencetak string 
       $this->fpdf->Cell(70,7,'LEGAL JAYA KOMPUTER',0,1,'C');
		$pdf->SetFont('Times','',8);
		$pdf->Cell(120,6,'');
       $this->fpdf->Cell(27,4,'No. Dok: FR.IT.0004',1,0);
		$pdf->Cell(23,4,'Edisi/Revisi : I/04',1,0);
		$pdf->Cell(17,4,'Hal : 1 dari 1',1,0);
		$pdf->Cell(10,15,'',0,1);
		
       $this->fpdf->SetFont('Arial','B',12);
       $this->fpdf->Cell(190,7,'Service System',0,1,'C');
		
// ================================= Bagian Header =================================================//
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,4,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'No. Form',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,"<?php echo $id_service;?>",1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Nama',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Job Title',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Departemen',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
// ================================= Bagian Date =================================================//
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,15,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(180,6,'DATE',1,0);
		
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Service Date',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Service Prosses',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Service Solved',1,0);
		$pdf->SetFont('Arial','B',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
	// ================================= Bagian Job Type =================================================//		
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,15,'',0,1);

       $this->fpdf->SetFont('Arial','B',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(180,6,'JOB Service',1,0);
		
		
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Job Type',1,0);
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(140,6,'',1,0);
		
			
		
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,60,'',1,0);
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(140,60,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,'','',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(40,6,'Job Description',0,0);
		$pdf->SetFont('Arial','',10);
       $this->fpdf->MultiCell(140,6,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0);
		
//==================================================================================================================//try	
		// Memberikan space kebawah agar tidak terlalu rapat
       $this->fpdf->Cell(10,60,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(45,6,'Service By :',1,0,'C');
		$pdf->Cell(90,6,'');
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(45,6,'Executed By :',1,0,'C');
		
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,6,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(45,35,'',1,0);
		$pdf->Cell(90,6,'');
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(45,35,'',1,0);
		
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Cell(10,'','',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(45,6,'Job Description',0,0,'C');
		$pdf->Cell(90,6,'');
		$pdf->SetFont('Arial','',10);
       $this->fpdf->MultiCell(45,6,'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',0);
		
		$pdf->Cell(10,4,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(45,6,'cccccccccccccc',0,0,'C');
		$pdf->Cell(90,6,'');
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(45,6,'xxxxxxxxx',0,0,'C');
		
		$pdf->Cell(10,7,'',0,1);

       $this->fpdf->SetFont('Arial','',10);
		$pdf->Cell(4,6,'');
       $this->fpdf->Cell(45,6,'Date : ',1,0);
		$pdf->Cell(90,6,'');
		$pdf->SetFont('Arial','',10);
       $this->fpdf->Cell(45,6,'Date :',1,0);
//==================================== try =============================================================//
	
    // Memberikan space kebawah agar tidak terlalu rapat
    //   $this->fpdf->Cell(10,15,'',0,1);

    //   $this->fpdf->SetFont('Arial','B',10);
	//	$pdf->Cell(4,6,'');
    //  $this->fpdf->Cell(30,6,'NIK',1,0);
    //   $this->fpdf->Cell(65,6,'NAMA ',1,0);
    //   $this->fpdf->Cell(37,6,'xxxxx',1,0);
    //   $this->fpdf->Cell(35,6,'XXXX',1,1);
		

    //   $this->fpdf->SetFont('Arial','',10);
		
    //    $service = $this->db->get('service')->result();
    //    foreach ($service as $row){
	//		$pdf->Cell(4,6,'');
    //       $this->fpdf->Cell(30,6,$row->id_service,1,0);
    //       $this->fpdf->Cell(65,6,$row->tanggal,1,0);
    //       $this->fpdf->Cell(37,6,$row->reported,1,0);
    //       $this->fpdf->Cell(35,6,$row->status,1,1); 
    //    }
$this->load->view('laporanpdf2');
      
?>