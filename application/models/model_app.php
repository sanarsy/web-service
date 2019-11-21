<?php

class Model_app extends CI_Model{
    // function __construct(){
    //     parent::__construct();
    // }

    //  ================= AUTOMATIC CODE ==================
    public function getkodeservice()
    {
		$tanggal = $time = date("d");
		$bulan = $time = date("m");
		$tahun = $time = date("Y");
      $q = $this->db->query("SELECT MAX(RIGHT(id_service,4)) AS kd_max FROM service WHERE month(tanggal)='$bulan'");
	  
        $nik = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
				$max_nik = $tmp;
				$tanggal = $time = date("d");
				$bulan = $time = date("m");
				$tahun = $time = date("Y");
				
                $nik = "ITS".$tahun.$bulan.$tanggal.sprintf("%04s", $tmp);
            }
        }else{
            $nik = "0001";
        }
		
        date_default_timezone_set('Asia/Jakarta');
        return $nik;
    }
	
 public function getkodeservice2()
    {
		$tanggal = $time = date("d");
		$bulan = $time = date("m");
		$tahun = $time = date("Y");
		$q = $this->db->query("SELECT MAX(RIGHT(id_penjualan,4)) AS kd_max FROM tbl_penjualan_header WHERE month(tanggal_penjualan)='$bulan'");
	  
        $nik = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
				$max_nik = $tmp;
				$tanggal = $time = date("d");
				$bulan = $time = date("m");
				$tahun = $time = date("Y");
				
                $nik = "PLJK".$tahun.$bulan.$tanggal.sprintf("%04s", $tmp);
            }
        }else{
            $nik = "0001";
        }
		
        date_default_timezone_set('Asia/Jakarta');
        return $nik;
    }
	
	public function getkodebarang()
    {
		$tanggal = $time = date("d");
		$bulan = $time = date("m");
		$tahun = $time = date("Y");
      $q = $this->db->query("SELECT MAX(RIGHT(id_barang,4)) AS kd_max FROM barang WHERE month(waktu_input)='$bulan'");
	  
        $nik = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $xxx = ((int)$k->kd_max)+1;
				$max_nik = $xxx;
				$tanggal = $time = date("d");
				$bulan = $time = date("m");
				$tahun = $time = date("Y");
				
                $nik = "ITINV".$tahun.$bulan.$tanggal.sprintf("%04s", $xxx);
            }
        }else{
            $nik = "";
        }
		
        date_default_timezone_set('Asia/Jakarta');
        return $nik;
    }
	
	public function getkodestbarang()
    {
		$tanggal = $time = date("d");
		$bulan = $time = date("m");
		$tahun = $time = date("Y");
      $q = $this->db->query("SELECT MAX(RIGHT(id_st,4)) AS kd_max FROM st_barang WHERE month(waktu_input)='$bulan'");
	  
        $nik = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $xxx = ((int)$k->kd_max)+1;
				$max_nik = $xxx;
				$tanggal = $time = date("d");
				$bulan = $time = date("m");
				$tahun = $time = date("Y");
				
                $nik = "ITST".$tahun.$bulan.$tanggal.sprintf("%04s", $xxx);
            }
        }else{
            $nik = "";
        }
		
        date_default_timezone_set('Asia/Jakarta');
        return $nik;
    }
 
    public function getkodekaryawan()
    {
        $query = $this->db->query("select max(nik) as max_code FROM karyawan");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_nik = $max_fix + 1;

        $nik = "K".sprintf("%04s", $max_nik);
        return $nik;
    }

     public function getkodeteknisi()
    {
        $query = $this->db->query("select max(id_teknisi) as max_code FROM teknisi");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_teknisi = $max_fix + 1;

        $id_teknisi = "T".sprintf("%04s", $max_id_teknisi);
        return $id_teknisi;
    }

     public function getkodeuser()
    {
        $query = $this->db->query("select max(id_user) as max_code FROM user");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 1, 4);

        $max_id_user = $max_fix + 1;

        $id_user = "U".sprintf("%04s", $max_id_user);
        return $id_user;
    }
    
    public function datajabatan()
    {
    $query = $this->db->query('SELECT * FROM jabatan');
    return $query->result();
    }
	
	public function datamerk()
    {
    $query = $this->db->query('SELECT * FROM merk');
    return $query->result();
    }
	
	public function datakatbrg()
    {
    $query = $this->db->query('SELECT * FROM katbrg');
    return $query->result();
    }	
	
	public function databarang5()
    {
    $query = $this->db->query('SELECT A.id_barang, A.kode_barang, A.nama_barang, A.total_stok, A.harga, A.id_katbrg, 
								A.id_merk, A.keterangan, A.dihapus, B.nama_merk, C.nama_katbrg
								FROM barang A LEFT JOIN merk B ON B.id_merk = A.id_merk
											  LEFT JOIN katbrg C ON C.id_katbrg = A.id_katbrg');
    return $query->result();
    }
	
	public function databarang25()
    {
    $query = $this->db->query("SELECT A.id_tbarang, A.id_barang, DATE_FORMAT(A.tgl, '%d-%m-%Y %H:%i:%s')as tgl_tbarang, 
								SUM(jml) AS qty, A.ket,
								B.nama_barang, C.nama_merk, D.nama_katbrg, B.kode_barang, B.harga, B.total_stok, B.keterangan
								FROM t_barang A 
								LEFT JOIN barang B ON B.id_barang = A.id_barang
								LEFT JOIN merk C ON C.id_merk = B.id_merk
								LEFT JOIN katbrg D ON D.id_katbrg = B.id_katbrg
								group by B.kode_barang
								");
    return $query->result();
    }	
	
	public function datatbarang35()
    {
    $query = $this->db->query("SELECT A.id_tbarang, A.id_barang, DATE_FORMAT(A.tgl, '%d-%m-%Y %H:%i:%s')as tgl_tbarang, A.jml, A.ket, B.nama_barang
								FROM t_barang A LEFT JOIN barang B ON B.id_barang = A.id_barang
								");
    return $query->result();
    }
	
  public function datakaryawan()
    {
    $query = $this->db->query('SELECT A.nama, A.nik, A.alamat, A.jk, A.level, B.nama_jabatan, D.nama_divisi, F.id_user, A.email, A.reported, A.waktu_input
								FROM karyawan A LEFT JOIN jabatan B ON B.id_jabatan = A.id_jabatan
												LEFT JOIN divisi D ON D.id_divisi = A.id_divisi
												LEFT JOIN user F ON F.nik = A.nik');
    return $query->result();
    }
	
    public function datalist_service()
    {

        $query = $this->db->query("SELECT A.status, DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, 
									A.skomputer, A.sparepart, A.id_kondisi, A.id_service,
									A.problem_detail, A.category, A.id_barang, D.nama, F.nama_divisi, 
									DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc,									
									C.nama_barang, (C.keterangan) as ket, C.jenis
									FROM service A 
									LEFT JOIN karyawan D ON D.nik = A.reported
									LEFT JOIN barang C ON C.id_barang = A.id_barang
									LEFT JOIN divisi F ON F.id_divisi = D.id_divisi	
									WHERE A.status IN (1,2,3,4,5,6,7)");
        return $query->result();

    }
	
	public function datalist_st()
    {

        $query = $this->db->query("SELECT A.status, DATE_FORMAT(A.tgl_st, '%d-%m-%Y %H:%i:%s')as tgl_st, 
									A.id_barang, A.id_karyawan, A.keterangan, DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input, A.reported,
									B.nama_barang, B.jenis, B.merk, B.keterangan,
									C.nama, 
									D.nama_divisi,
									E.nama_jabatan
									FROM st_barang A 
									LEFT JOIN barang B ON B.id_barang = A.id_barang
									LEFT JOIN karyawan C ON C.nik = A.id_karyawan
									LEFT JOIN divisi D ON D.id_divisi = A.id_divisi
									LEFT JOIN jabatan E ON E.id_jabatan = C.id_jabatan	
									WHERE A.status IN (0,1,2,3,4,5,6,7)");
        return $query->result();

    }
	public function stbarang_list()
    {

        $query = $this->db->query("SELECT A.status, DATE_FORMAT(A.tgl_st, '%d-%m-%Y %H:%i:%s')as tgl_st, 
									A.id_barang, A.id_karyawan, A.keterangan, A.id_st,
									DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input, A.reported,
									B.nama_barang, B.jenis, B.merk, (B.keterangan) as ket,
									C.nama, 
									D.nama_divisi,
									E.nama_jabatan
									FROM st_barang A 
									LEFT JOIN barang B ON B.id_barang = A.id_barang
									LEFT JOIN karyawan C ON C.nik = A.id_karyawan
									LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
									LEFT JOIN jabatan E ON E.id_jabatan = C.id_jabatan	
									WHERE A.status IN (0,1,2,3,4,5,6,7)");
        return $query->result();

    }
	
	public function stbarang_list2()
    {

        $query = $this->db->query("SELECT A.status, DATE_FORMAT(A.tgl_st, '%d-%m-%Y %H:%i:%s')as tgl_st, 
									A.id_barang, A.id_karyawan, A.keterangan, A.id_st,
									DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input, A.reported,
									B.nama_barang, B.jenis, B.merk, (B.keterangan) as ket,
									C.nama, 
									D.nama_divisi,
									E.nama_jabatan
									FROM st_barang A 
									LEFT JOIN barang B ON B.id_barang = A.id_barang
									LEFT JOIN karyawan C ON C.nik = A.id_karyawan
									LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
									LEFT JOIN jabatan E ON E.id_jabatan = C.id_jabatan	
									WHERE A.status IN (1,2)");
        return $query->result();

    }
	
	public function datalist_barang()
    {

        $query = $this->db->query("SELECT A.status, DATE_FORMAT(A.tgl_po, '%d-%m-%Y %H:%i:%s')as tgl_po, 
									A.id_barang, A.no_po, A.nama_barang, DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input,
									A.merk, A.keterangan, A.reported, A.status, A.jenis, concat(format(A.harga,2)) as harga,  
									B.nama, B.nik, B.id_divisi,
									C.nama_divisi
									FROM barang A 
									LEFT JOIN karyawan B ON B.nik = A.reported
									LEFT JOIN divisi C ON C.id_divisi = B.id_divisi
									WHERE A.status IN (0,1,2,3,4,5,6,7)");
        return $query->result();

    }

    public function data_trackingservice($id)
    {

        $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.status, A.deskripsi, B.nama
									FROM tracking A 
									LEFT JOIN karyawan B ON B.nik = A.id_user
									WHERE A.id_history ='$id'");
	
        return $query->result();

    }


    public function datainformasi()
    {

        $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal,'%d-%m-%Y %H:%i:%s')as tanggal, A.subject, 
									A.pesan, A.file_informasi, A.status, C.nama, A.id_informasi
									FROM informasi A 
									LEFT JOIN karyawan C ON C.nik =  A.id_user
									WHERE A.status IN (0,1) order by A.id_informasi desc" );
        return $query->result();

    }

    public function datamyservice($id)
    {
        $query = $this->db->query("SELECT A.progress, DATE_FORMAT(A.tanggal_proses, '%d-%m-%Y %H:%i:%s')as tgl_proses, A.id_barang, 
									DATE_FORMAT(A.tanggal_solved, '%d-%m-%Y %H:%i:%s')as tgl_solved, A.id_teknisi, A.id_kondisi, A.status, A.id_barang, A.category, A.skomputer, A.sparepart, 
									A.problem_detail, A.id_service, DATE_FORMAT(A.tanggal_service, '%d-%m-%Y')as tgl_svc, DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service,  
									B.feedback,
									C.nama_barang, (C.keterangan) as ket, C.jenis
									FROM service A 
									LEFT JOIN history_feedback B ON B.id_service = A.id_service
									LEFT JOIN barang C ON C.id_barang = A.id_barang
									WHERE A.reported = '$id'");									
									
    return $query->result();
    }
	
	
    public function datamyassignment($id)
    {
        $query = $this->db->query("SELECT A.progress, A.status, A.id_service, A.problem_detail, A.reported, A.skomputer, A.sparepart, A.id_barang,
									DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.category, 
									DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc,
									C.nama_barang, (C.keterangan) as ket, C.jenis
									FROM service A 
									LEFT JOIN karyawan D ON D.nik = A.reported
									LEFT JOIN barang C ON C.id_barang = A.id_barang
									LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
									LEFT JOIN karyawan F ON F.nik = E.nik
									WHERE F.nik = '$id'
									AND A.status IN (3,4,5,6,7)
									");
								   
        return $query->result();
    }

     public function dataapproval($id)
    {
    $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.status,A.status, A.skomputer, A.sparepart, A.id_barang,
								A.id_service, A.id_kondisi, A.problem_detail, A.category, D.nama, 
								DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc, 
								C.nama_barang, (C.keterangan) as ket, C.jenis
								FROM service A 
								LEFT JOIN karyawan D ON D.nik = A.reported
								LEFT JOIN barang C ON C.id_barang = A.id_barang
								LEFT JOIN divisi E ON E.id_divisi = D.id_divisi
								WHERE E.id_divisi = $id AND A.status = 1 OR  A.status= 0");		
					
    return $query->result();
    }
		
     public function datadivisi()
    {
    $query = $this->db->query('SELECT * FROM divisi');
    return $query->result();
    }

    public function datakondisi()
    {
    $query = $this->db->query('SELECT * FROM kondisi');
    return $query->result();
    }

    public function datateknisi()
    {
    $query = $this->db->query('SELECT A.point, A.id_teknisi, B.nama, B.jk, A.spesialis, A.status, A.reported, A.waktu_input, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                
                                 ');
    return $query->result();
    }


    public function datareportteknisi($id)
    {
     $query = $this->db->query("SELECT A.progress, DATE_FORMAT(A.tanggal_proses, '%d-%m-%Y %H:%i:%s')as tgl_proses, A.status, A.skomputer, A.sparepart, A.id_barang, 
								A.category, A.problem_detail, B.nama, F.nama_divisi, DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc,
								C.nama_barang, (C.keterangan) as ket, C.jenis									
								FROM service A 
                                LEFT JOIN karyawan B ON B.nik = A.reported
								LEFT JOIN barang C ON C.id_barang = A.id_barang
                                LEFT JOIN divisi F ON F.id_divisi = B.id_divisi
                                WHERE id_teknisi = '$id'"                        
                                 );
    return $query->result();
    }


    public function datauser()
    {
         $query = $this->db->query('SELECT A.nik, A.id_user, A.password, A.photo,
									B.nik, B.nama, B.level, D.id_divisi, D.nama_divisi, B.email 
									FROM user A 
									LEFT JOIN karyawan B ON B.nik = A.nik
									LEFT JOIN divisi D ON D.id_divisi = B.id_divisi
									');

         return $query->result();

    }
	
    public function datakategori()
    {
    $query = $this->db->query('SELECT * FROM kategori');
    return $query->result();
    }
	
	public function dataservice()
    {
    $query = $this->db->query("SELECT * FROM service WHERE status IN (6) ORDER BY id_service");
    return $query->result();
    }

    public function dataassigment($id)
    {
    $query = $this->db->query('SELECT A.status, D.nama, A.id_service, A.tanggal, A.id_kondisi, A.problem_detail, A.id_barang,
								A.category, A.skomputer, A.sparepart, A.tanggal_service,
                C.nama_barang, (C.keterangan) as ket, C.jenis
				FROM service A 
				LEFT JOIN barang C ON C.id_barang = A.id_barang
                LEFT JOIN karyawan D ON D.nik = A.reported
                WHERE A.id_teknisi = "$id"');
    return $query->result();
    }

    public function dropdown_divisi()
    {
        $sql = "SELECT * FROM divisi ORDER BY nama_divisi";
            $query = $this->db->query($sql);
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_divisi] = $row->nama_divisi;
            }
            return $value;
    }

    public function dropdown_kategori()
    {
        $sql = "SELECT * FROM kategori ORDER BY category";
        $query = $this->db->query($sql);
            
            
            foreach ($query->result() as $row){
                $value[$row->id_kategori] = $row->category;
            }
            return $value;
    }

    public function dropdown_karyawan()
    {
        $sql = "SELECT A.nama, A.nik FROM karyawan A 
                LEFT JOIN divisi C ON C.id_divisi = A.id_divisi 
                ORDER BY nama";
        $query = $this->db->query($sql);
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->nik] = $row->nama;
            }
            return $value;
    }

    public function dropdown_jabatan()
    {
        $sql = "SELECT * FROM jabatan ORDER BY nama_jabatan";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_jabatan] = $row->nama_jabatan;
        }
        return $value;
    }
	
    public function dropdown_kondisi()
    {
        $sql = "SELECT * FROM kondisi ORDER BY nama_kondisi";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_kondisi] = $row->nama_kondisi."  -  (TARGET PROSES ".$row->waktu_respon." "."Hours)";
        }
        return $value;
    }

	public function dropdown_merk()
    {
        $sql = "SELECT * FROM merk ORDER BY nama_merk";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_merk] = $row->nama_merk;
        }
        return $value;
    }
	public function dropdown_barang()
    {
        $sql = "SELECT * FROM barang 
		where status IN(0,1)ORDER BY nama_barang";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_barang] = $row->nama_barang ;
		}
        return $value;
    }
	
	public function dropdown_barang2()
    {
        $sql = "SELECT A.status, DATE_FORMAT(A.tgl_st, '%d-%m-%Y %H:%i:%s')as tgl_st, 
				A.id_barang, A.id_karyawan, A.keterangan, A.id_st,
				DATE_FORMAT(A.waktu_input, '%d-%m-%Y %H:%i:%s')as waktu_input, A.reported,
				B.nama_barang, B.jenis, B.merk, (B.keterangan) as ket,
				C.nama, 
				D.nama_divisi,
				E.nama_jabatan
				FROM st_barang A 
				LEFT JOIN barang B ON B.id_barang = A.id_barang
				LEFT JOIN karyawan C ON C.nik = A.id_karyawan
				LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
				LEFT JOIN jabatan E ON E.id_jabatan = C.id_jabatan";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_barang] = $row->nama_barang ;
		}
        return $value;
    }
	
	public function dropdown_service()
    {
        $sql = "SELECT * FROM service WHERE status IN (6) ORDER BY id_service";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_service] = $row->id_service;
        }
        return $value;
    }
	
    function dropdown_teknisi()
    {
        $sql = "SELECT A.id_teknisi, B.nama, B.jk, A.spesialis, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                ";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_teknisi] = $row->nama;
        }
        return $value;

    }
    public function dropdown_jk()
    {
        $value[''] = '--PILIH--';            
        $value['LAKI-LAKI'] = 'LAKI-LAKI';
        $value['PEREMPUAN'] = 'PEREMPUAN';           
            
            return $value;
    }

    public function dropdown_level()
    {
        $value[''] = '--PILIH--';            
        $value['ADMIN'] = 'ADMIN';
        $value['TEKNISI'] = 'TEKNISI';
		$value['MANAGER'] = 'MANAGER';
        $value['USER'] = 'USER';           
            
            return $value;
    }

	public function myservice_detail($id)
	 {
		$sql = "SELECT A.status, A.progress,A.tanggal, A.tanggal_solved, A.tanggal_proses, 
					A.tanggal_solved, A.id_service, A.problem_detail, A.tanggal, A.category, A.id_barang,
					D.nama, F.nama AS nama_teknisi, A.skomputer, A.sparepart, DATE_FORMAT(A.tanggal_service, '%d-%m-%Y %H:%i:%s')as tgl_svc,
					C.nama_barang, (C.keterangan) as ket, C.jenis					
					FROM service A 
					LEFT JOIN karyawan D ON D.nik = A.reported 
					LEFT JOIN barang C ON C.id_barang = A.id_barang
					LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
					LEFT JOIN karyawan F ON F.nik = E.nik	
					WHERE A.id_service = '$id'";

			$row = $this->db->query($sql)->row();
	   
	 }
 //========================================= test ======================================//
//function delTransaksi($id_divisi){ //fungsi delete berdasarkan id
function deldivisi($id_divisi){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_divisi;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete divisi";
	$history['id_user'] = $id_user;
    $this->db->where('id_divisi',$id_divisi); 
    $this->db->delete('divisi'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
} 

function delInformasi($id_informasi){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_informasi;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete informasi";
	$history['id_user'] = $id_user;
    $this->db->where('id_informasi',$id_informasi); 
    $this->db->delete('informasi'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
} 

function delJabatan($id_jabatan){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_jabatan;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete jabatan";
	$history['id_user'] = $id_user;
    $this->db->where('id_jabatan',$id_jabatan); 
    $this->db->delete('jabatan'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delKaryawan($nik){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $nik;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete karyawan";
	$history['id_user'] = $id_user;
    $this->db->where('nik',$nik); 
    $this->db->delete('karyawan'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delKategoori($id_kategori){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_kategori;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete kategori";
	$history['id_user'] = $id_user;
    $this->db->where('id_kategori',$id_kategori); 
    $this->db->delete('kategori'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delKondisi($id_kondisi){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_kondisi;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete kondisi";
	$history['id_user'] = $id_user;
    $this->db->where('id_kondisi',$id_kondisi); 
    $this->db->delete('kondisi'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delTeknisi($id_teknisi){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_teknisi;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete teknisi";
	$history['id_user'] = $id_user;
    $this->db->where('id_teknisi',$id_teknisi); 
    $this->db->delete('teknisi'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}


function delService($id_service){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_service;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete service";
	$history['id_user'] = $id_user;
    $this->db->where('id_service',$id_service); 
    $this->db->delete('service'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delNik($nik){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $nik;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete nik";
	$history['id_user'] = $id_user;
    $this->db->where('nik',$nik); 
    $this->db->delete('karyawan'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
} 

function delUser($id_user){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_user;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete user";
	$history['id_user'] = $id_user;
    $this->db->where('id_user',$id_user); 
    $this->db->delete('user'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delBarang($id_barang){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_barang;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete barang";
	$history['id_user'] = $id_user;
    $this->db->where('id_barang',$id_barang); 
    $this->db->delete('barang'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}

function delStbarang($id_st){ //fungsi delete berdasarkan id
	
	$id_user = trim($this->session->userdata('id_user'));
	$tanggal = $time = date("Y-m-d  H:i:s");
	
	$brg['id_barang'] = $id_barang;
	$brg['status'] = 1;
	
	$this->db->where('id_barang', $id_barang);
	$this->db->update('barang', $brg);
	
	$history['tanggal'] = $tanggal;
    $history['id_history'] =  $id_st;
    $history['status'] = "delete";
	$history['deskripsi'] = "delete Serah Terima Barang";
	$history['id_user'] = $id_user;
	
    $this->db->where('id_st',$id_st);
	
    $this->db->delete('st_barang'); //eksekusi
	$this->db->insert('tracking', $history);
	
    return;
}  
 
 
 
	
}