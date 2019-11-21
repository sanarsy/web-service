<?php

class Info2 extends CI_Model{
    // function __construct(){
    //     parent::__construct();
    // }

    //  ================= AUTOMATIC CODE ==================
    public function getkodeservice()
    {
        $query = $this->db->query("select max(id_service) as max_code FROM service");

        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id, 9, 4);

        $max_nik = $max_fix + 1;
		
        $tanggal = $time = date("d");
        $bulan = $time = date("m");
        $tahun = $time = date("Y");
		
        $nik = "T".$tahun.$bulan.$tanggal.sprintf("%04s", $max_nik);
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

    public function datakaryawan()
    {
    $query = $this->db->query('SELECT A.nama, A.nik, A.alamat, A.jk, C.nama_divisi, B.nama_jabatan, D.nama_divisi, F.id_user
                               FROM karyawan A LEFT JOIN jabatan B ON B.id_jabatan = A.id_jabatan
                                               LEFT JOIN divisi C ON C.id_divisi = A.id_divisi
                                               LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
											   LEFT JOIN user F ON F.nik = A.nik');
    return $query->result();
    }

    public function datalist_service2($id_service_info)
    {
        
         //   $tgl_awal= date_create(DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s'));
           // $tgl_akhir= date_create(DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s'));

        
            
            $query = $this->db->query("SELECT A.status, A.id_service, convert((DATE_FORMAT(A.tanggal, '%d-%m-%Y')), char) as tgl_service, 
										A.skomputer, A.sparepart, A.id_kondisi,	A.category, D.nama, F.nama_divisi
										FROM service A
										LEFT JOIN karyawan D ON D.nik = A.reported
										LEFT JOIN divisi F ON F.id_divisi = D.id_divisi
										WHERE A.status IN (1,2,3,4,5,6,7) AND A.id_service= '$id_service_info' ") ;
       

        return $query->result();

    }

    public function data_trackingservice($id)
    {

        $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.status, A.deskripsi, B.nama
                                   FROM tracking A 
                                   LEFT JOIN karyawan B ON B.nik = A.id_user
                                   WHERE A.id_service ='$id'");

		
        return $query->result();

    }


    public function datainformasi()
    {

        $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal,'%d-%m-%Y %H:%i:%s')as tanggal, A.subject, A.pesan, C.nama, A.id_informasi
                                   FROM informasi A 
                                   LEFT JOIN karyawan C ON C.nik =  A.id_user
                                   WHERE A.status = 1");
        return $query->result();

    }

    public function datamyservice($id)
    {
        $query = $this->db->query("SELECT A.progress, DATE_FORMAT(A.tanggal_proses, '%d-%m-%Y %H:%i:%s')as tgl_proses, DATE_FORMAT(A.tanggal_solved, '%d-%m-%Y %H:%i:%s')as tgl_solved, A.id_teknisi, 
									A.id_kondisi, A.status, A.id_service, DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.skomputer, A.sparepart, A.category, D.feedback
                                   FROM service A  
                                   LEFT JOIN history_feedback D ON D.id_service = A.id_service
                                   WHERE A.reported = '$id' AND status = 1 ");
    return $query->result();
    }


    public function datamyassignment($id)
    {
        $query = $this->db->query("SELECT A.progress, A.status, A.id_service, A.reported,DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.skomputer, A.sparepart, A.category
                                   FROM service A	
                                   LEFT JOIN karyawan D ON D.nik = A.reported
                                   LEFT JOIN teknisi E ON E.id_teknisi = A.id_teknisi
                                   LEFT JOIN karyawan F ON F.nik = E.nik
                                   WHERE F.nik = '$id'
                                   AND A.status IN (3,4,5,6)
                                   ");
								   
        return $query->result();
    }

     public function dataapproval($id)
    {
    $query = $this->db->query("SELECT DATE_FORMAT(A.tanggal, '%d-%m-%Y %H:%i:%s')as tgl_service, A.status,A.status, A.id_service,
								A.id_kondisi, B.category, D.nama, A.skomputer, A.sparepart
        FROM service A 
        LEFT JOIN karyawan D ON D.nik = A.reported 
        LEFT JOIN divisi E ON E.id_divisi = D.id_divisi WHERE E.id_divisi = $id AND A.status = 1 OR  A.status= 0");		
					
    return $query->result();
    }
	
		
     public function datadivisi()
    {
    $query = $this->db->query('SELECT * FROM divisi');
    return $query->result();
    }

     public function datadivisi()
    {
    $query = $this->db->query('SELECT * FROM divisi A LEFT JOIN divisi B ON B.id_divisi = A.id_divisi ');
    return $query->result();
    }

    public function datakondisi()
    {
    $query = $this->db->query('SELECT * FROM kondisi');
    return $query->result();
    }

    public function datateknisi()
    {
    $query = $this->db->query('SELECT A.point, A.id_teknisi, B.nama, B.jk, A.spesialis, A.status, A.point FROM teknisi A 
                                LEFT JOIN karyawan B ON B.nik = A.nik
                                
                                 ');
    return $query->result();
    }


    public function datareportteknisi($id)
    {
     $query = $this->db->query("SELECT A.progress, DATE_FORMAT(A.tanggal_proses, '%d-%m-%Y %H:%i:%s')as tgl_proses, A.status, A.category, A.skomputer, A.sparepart, 
								B.nama, B.spesialis, F.nama_divisi  FROM service A 
                                LEFT JOIN karyawan B ON B.nik = A.reported
                                LEFT JOIN divisi E ON E.id_divisi = B.id_divisi
                                LEFT JOIN divisi F ON F.id_divisi = E.id_divisi
                                WHERE id_teknisi = '$id'"                        
                                 );
    return $query->result();
    }


    public function datauser()
    {
         $query = $this->db->query('SELECT A.nik, A.id_user, B.nik, B.nama, A.password, A.photo, C.id_divisi, D.nama_divisi 
            FROM user A LEFT JOIN karyawan B ON B.nik = A.nik 
            LEFT JOIN divisi C ON C.id_divisi = B.id_divisi 
            LEFT JOIN divisi D ON D.id_divisi = C.id_divisi
                                 ');

         return $query->result();

    }
    public function datakategori()
    {
    $query = $this->db->query('SELECT * FROM kategori');
    return $query->result();
    }

    public function dataassigment($id)
    {
    $query = $this->db->query('SELECT A.status, D.nama, C.id_kategori, A.id_service, A.tanggal, A.id_kondisi, A.category, A.skomputer, A.sparepart
                FROM service A 
                LEFT JOIN karyawan D ON D.nik = A.reported 
                WHERE A.id_teknisi = "$id"');
    return $query->result();
    }

    public function datasubkategori()
    {
    $query = $this->db->query('SELECT * FROM sub_kategori A LEFT JOIN kategori B ON B.id_kategori = A.id_kategori ');
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
            
            $value[''] = '-- PILIH --';
            foreach ($query->result() as $row){
                $value[$row->id_kategori] = $row->category;
            }
            return $value;
    }

    public function dropdown_karyawan()
    {
        $sql = "SELECT A.nama, A.nik FROM karyawan A 
                LEFT JOIN divisi B ON B.id_divisi = A.id_divisi
                LEFT JOIN divisi C ON C.id_divisi = b.id_divisi 
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

    public function dropdown_divisi($id_divisi)
    {
        $sql = "SELECT * FROM divisi where id_divisi ='$id_divisi' ORDER BY nama_divisi";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_divisi] = $row->nama_divisi;
        }
        return $value;
    }

    public function dropdown_sub_kategori($id_kategori)
    {
        $sql = "SELECT * FROM sub_kategori where id_kategori ='$id_kategori' ORDER BY nama_sub_kategori";
        $query = $this->db->query($sql);
            
        $value[''] = '-- PILIH --';
        foreach ($query->result() as $row){
            $value[$row->id_sub_kategori] = $row->nama_sub_kategori;
        }
        return $value;
    }

    function dropdown_teknisi()
    {

        $sql = "SELECT A.id_teknisi, B.nama, B.jk, A.status, A.point FROM teknisi A 
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
        $value['USER'] = 'USER';           
            
            return $value;
    }



   

   

}