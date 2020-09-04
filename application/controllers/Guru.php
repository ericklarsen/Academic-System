<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

function __construct() {
    parent::__construct();

    $this->load->model('Staff_model');
}

public function index() {
    $data = array(
       'title' => "General Dashboard"
    );
      $this->load->view('guru/home', $data);
}

public function home(){
    //$data['title'] = "Dashboard";

    $this->load->view('guru/home');
}

public function kelas(){
    $data['title'] = "Daftar Kelas Diampuh";
    $this->load->view('guru/daftar_kelas',$data);
}

public function regis_semester(){
    $data['title'] = "Registrasi";
    $this->load->view('guru/registrasi',$data);
}

public function aksi_regis_semester($id_kelas){

    $data = array(
        'semester' => 'genap',
    );

    $where = array('id_kelas' => $id_kelas);
    $this->Staff_model->save_edit($data, $where, 'kelas');

    $cek = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','soal');
    $where2 = array('id_soal' => $cek->id_soal);
    $this->Staff_model->hapus($where, 'soal');
    $this->Staff_model->hapus($where2, 'soal_ujian');
    $this->session->set_flashdata('success', "Suksess");
    redirect('guru/regis_semester/');
}

public function absensi(){
    $data['title'] = "Daftar Absensi Kelas";
    $this->load->view('guru/absensi',$data);
}

public function absensi_list($id_kelas, $id_pelajaran){
    $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $data['title'] = "Daftar Absensi ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['lists'] = $this->Staff_model->ambil_data_semua_4($id_kelas,'tanggal, pertemuan, id_pelajaran, nis','id_kelas',$id_pelajaran,'id_pelajaran','absensi');
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $this->load->view('guru/absensi_list',$data);
}

public function absensi_list_detail($tanggal,$id_pelajaran,$pertemuan,$id_kelas){
    $data['title'] = "Absensi ".date("l, d F Y",strtotime($tanggal));
    $data['id_kelas'] = $id_kelas;
    $data['lists'] = $this->Staff_model->ambil_data_id_array_4($tanggal,'tanggal',$id_pelajaran,'id_pelajaran',$pertemuan,'pertemuan',$id_kelas,'id_kelas','absensi');

    $this->load->view('guru/absensi_list_detail',$data);
}

public function absensi_list_detail_edit($id_absensi,$id_kelas){
    $data['title'] = "Ubah Data Absensi";
    $data['id_kelas'] = $id_kelas;
    $data['lists'] = $this->Staff_model->ambil_data_id($id_absensi,'id_absensi','absensi');
    $this->load->view('guru/absensi_list_detail_edit',$data);
}

public function aksi_absensi_list_detail_edit(){
    $pertemuan = $this->input->post('pertemuan');
    $id_absensi = $this->input->post('id_absensi');
    $id_pelajaran = $this->input->post('id_pelajaran');
    $id_kelas = $this->input->post('id_kelas');
    $keterangan = $this->input->post('keterangan');
    $tanggal = $this->input->post('tanggal');

    $data = array(
        'pertemuan' => $pertemuan,
        'keterangan' => $keterangan,
        'tanggal' => $tanggal,
    );

    $where = array('id_absensi' => $id_absensi);
    $this->Staff_model->save_edit($data, $where, 'absensi');
    redirect('guru/absensi_list/'.$id_kelas.'/'.$id_pelajaran);
}

public function isi_absensi($id_kelas,$id_pelajaran){
    $data['title'] = "Isi Absensi 10 IPA 1";
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $this->load->view('guru/absensi_isi',$data);
}

public function aksi_isi_absensi(){
    $nis = $this->input->post('nis');
    $id_kelas = $this->input->post('id_kelas');
    $id_pelajaran = $this->input->post('id_pelajaran');
    $pertemuan = $this->input->post('pertemuan');
    $tanggal = $this->input->post('tanggal');
    $semester = $this->input->post('semester');
    $keterangan = $this->input->post('keterangan');
    $data = array();

    $cek1 = $this->Staff_model->ambil_data_id_3($id_pelajaran,'id_pelajaran',$tanggal,'tanggal',$id_kelas,'id_kelas','absensi');
    if (!$cek1) {
        $index = 0;
        foreach($nis as $data_murid){
            array_push($data, array(
                'nis'=>$data_murid,
                'id_pelajaran'=>$id_pelajaran,
                'id_kelas'=>$id_kelas,
                'keterangan'=>$keterangan[$index],
                'tanggal'=>$tanggal,
                'pertemuan'=>$pertemuan,
                'semester'=>$semester,
            ));

            $index++;
        }

        $this->Staff_model->save_batch($data, 'absensi');
        redirect('guru/absensi_list/'.$id_kelas.'/'.$id_pelajaran);
    }else{
        $this->session->set_flashdata('error', "Tanggal / pertemuan telah ada, harap mengisi dengan teliti lagi.");
        redirect('guru/isi_absensi/'.$id_kelas.'/'.$id_pelajaran);
    }

}

public function isi_nilai_murid($nis,$nama,$id_pelajaran,$id_kelas){
    $data['title'] = "Rekap Absensi";
    $data['nis'] = $nis;
    $data['nama'] = $nama;
    $data['id_pelajaran'] = $id_pelajaran;
    $data['id_kelas'] = $id_kelas;
    $cek = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $data['lists'] = $this->Staff_model->ambil_data_id_3($id_pelajaran,'id_pelajaran',$nis,'nis',$cek->semester,'semester','nilai');
    $this->load->view('guru/isi_nilai_murid',$data);
}

public function murid($id_kelas,$id_pelajaran){
    $data['title'] = "Daftar Kelas Diampuh";
    $data['title2'] = "Daftar Nilai";
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $this->load->view('guru/daftar_murid',$data);
}

public function aksi_isi_nilai_murid(){
    $id_pelajaran = $this->input->post('id_pelajaran');
    $id_kelas = $this->input->post('id_kelas');
    $nis = $this->input->post('nis');
    $uh = $this->input->post('uh');
    $lisan = $this->input->post('lisan');
    $tugas = $this->input->post('tugas');
    $uts = $this->input->post('uts');
    $uas = $this->input->post('uas');
    $tingkat = $this->input->post('tingkat');
    $semester = $this->input->post('semester');

    $cek = $this->Staff_model->ambil_data_id_3($nis,'nis',$id_pelajaran,'id_pelajaran',$semester,'semester','nilai');
    $total_uh = array_sum($uh)/count($uh);
    $total_lisan = array_sum($lisan)/count($lisan);
    $total_tugas = array_sum($tugas)/count($tugas);
    $total_akhir = ($total_uh + $total_lisan + $total_tugas + $uts + $uas)/5;
    $predikat = '';

    if ($total_akhir >= 90) {
        $predikat = 'A';
    }elseif ($total_akhir < 90 && $total_akhir >= 80) {
        $predikat = 'B';
    }elseif ($total_akhir < 80 && $total_akhir >= 70 ) {
        $predikat = 'C';
    }else {
        $predikat = 'D';
    }

    if ($cek != null) {
        $data = array(
            'nis' => $nis,
            'uh' => $total_uh,
            'lisan' => $total_lisan,
            'tugas' => $total_tugas,
            'uts' => $uts,
            'uas' => $uas,
            'tingkat' => $tingkat,
            'semester' => $semester,
            'nilai_akhir' => $total_akhir,
            'predikat' => $predikat,
        );
        $where = array('id_pelajaran' => $id_pelajaran, 'nis' => $nis);
        $this->Staff_model->save_edit($data, $where, 'nilai');
        
    }else{
        $data = array(
            'id_pelajaran' => $id_pelajaran,
            'nis' => $nis,
            'uh' => $total_uh,
            'lisan' => $total_lisan,
            'tugas' => $total_tugas,
            'uts' => $uts,
            'uas' => $uas,
            'tingkat' => $tingkat,
            'semester' => $semester,
            'nilai_akhir' => $total_akhir,
            'predikat' => $predikat,
        );
    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
        $this->Staff_model->save_tambah($data, 'nilai');
    }

    redirect('guru/murid/'.$id_kelas.'/'.$id_pelajaran);
}

public function rekap_absensi(){
    $data['title'] = "Rekap Absensi";
    $this->load->view('guru/rekap_absensi',$data);
}

public function rekap_absensi_detail($id_pelajaran, $id_kelas){
    $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $pelajaran = $this->Staff_model->ambil_data_id($id_pelajaran,'id_pelajaran','pelajaran');
    $data['title2'] = "Daftar Absensi ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['title3'] = $pelajaran->nama;
    $data['lists'] = $this->Staff_model->ambil_data_semua_4($id_kelas,'tanggal, pertemuan, id_pelajaran, nis','id_kelas',$id_pelajaran,'id_pelajaran','absensi');
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $data['title'] = "Absensi";
    $this->load->view('guru/rekap_absensi_detail',$data);
}

public function rekap_absensi_detail2($tanggal,$id_pelajaran,$pertemuan,$id_kelas){
    $data['title'] = "Absensi ".date("l, d F Y",strtotime($tanggal));
    $data['id_kelas'] = $id_kelas;
    $data['lists'] = $this->Staff_model->ambil_data_id_array_4($tanggal,'tanggal',$id_pelajaran,'id_pelajaran',$pertemuan,'pertemuan',$id_kelas,'id_kelas','absensi');

    $this->load->view('guru/rekap_absensi_detail2',$data);
}

public function rekap_nilai(){
    $data['title'] = "Daftar Nilai";
    $cek1 = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas');
    $data['lists1'] = $this->Staff_model->ambil_data_id_array_2($cek1->tingkat,'tingkat','ganjil','semester','nilai');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array_2($cek1->tingkat,'tingkat','genap','semester','nilai');
    $this->load->view('guru/rekap_nilai',$data);
}

public function rekap_nilai_detail($tingkat,$semester,$nis){
    $data['title'] = "Detail Nilai";
    $data['tingkat'] = $tingkat;
    $data['semester'] = $semester;
    $data['nis'] = $nis;
    $this->load->view('guru/rekap_nilai_detail',$data);
}

public function rekap_nilai_detail_2($id_nilai){
    $data['title'] = "Detail Nilai";
    $data['lists'] = $this->Staff_model->ambil_data_id($id_nilai,'id_nilai','nilai');
    $this->load->view('guru/rekap_nilai_detail_2',$data);
}

public function nilai_sikap(){
    $data['title'] = "Nilai Sikap";
    $this->load->view('guru/nilai_sikap',$data);
}

public function isi_nilai_sikap($nis,$nama,$id_pelajaran,$id_kelas){
    $data['title'] = "Nilai Sikap Kelas 10 IPA 1";
    $data['nis'] = $nis;
    $data['nama'] = $nama;
    $data['id_pelajaran'] = $id_pelajaran;
    $data['id_kelas'] = $id_kelas;
    $this->load->view('guru/isi_nilai_sikap',$data);
}

public function aksi_isi_nilai_sikap(){
    $id_pelajaran = $this->input->post('id_pelajaran');
    $id_kelas = $this->input->post('id_kelas');
    $nis = $this->input->post('nis');
    $tingkat = $this->input->post('tingkat');
    $semester = $this->input->post('semester');
    $spritual = $this->input->post('spritual');
    $sosial = $this->input->post('sosial');

    $cek = $this->Staff_model->ambil_data_id_2($nis,'nis',$id_pelajaran,'id_pelajaran','nilai');

    if ($cek != null) {
        $data = array(
            'spritual' => $spritual,
            'sosial' => $sosial,
        );
        $where = array('id_pelajaran' => $id_pelajaran, 'nis' => $nis, 'tingkat' => $tingkat, 'semester' => $semester);
        $this->Staff_model->save_edit($data, $where, 'nilai');
        
    }else{
        $data = array(
            'spritual' => $spritual,
            'sosial' => $sosial,
        );
    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
        $this->Staff_model->save_tambah($data, 'nilai');
    }

    redirect('guru/murid/'.$id_kelas.'/'.$id_pelajaran);
}

public function rekap_sanksi(){
    $data['title'] = "Rekap Sanksi Kelas 10 IPA 1";
    $data['lists'] = $this->Staff_model->ambil_data_semua('sanksi');
    $this->load->view('guru/rekap_sanksi',$data);
}

public function rekap_prestasi(){
    $data['title'] = "Rekap Prestasi Kelas 10 IPA 1";
    $data['lists'] = $this->Staff_model->ambil_data_semua('prestasi');
    $this->load->view('guru/rekap_prestasi',$data);
}

public function tambah_sanksi($id_kelas){
    $data['title'] = "Tambah Sanksi";
    $data['id_kelas'] = $id_kelas;
    $this->load->view('guru/tambah_sanksi',$data);
}

public function tambah_prestasi($id_kelas){
    $data['id_kelas'] = $id_kelas;
    $data['title'] = "Tambah Prestasi";
    $this->load->view('guru/tambah_prestasi',$data);
}

public function aksi_tambah_sanksi(){
    $id_ksanksi = $this->input->post('id_ksanksi');
    $penanganan = $this->input->post('penanganan');
    $nis = $this->input->post('nis');

    $data = array(
        'id_ksanksi' => $id_ksanksi,
        'penanganan' => $penanganan,
        'nis' => $nis,
    );
    $this->Staff_model->save_tambah($data, 'sanksi');

    redirect('guru/rekap_sanksi');
}

public function aksi_tambah_prestasi(){
    $prestasi = $this->input->post('prestasi');
    $nis = $this->input->post('nis');

    $data = array(
        'isi' => $prestasi,
        'nis' => $nis,
    );
    $this->Staff_model->save_tambah($data, 'prestasi');

    redirect('guru/rekap_prestasi');
}

public function soal_ujian_online(){
    $data['title'] = "Soal Ujian Online";
    $this->load->view('guru/soal_ujian_online',$data);
}

public function hapus_soal_ujian_online($id_soal){
    $where = array('id_soal' => $id_soal);
    $this->Staff_model->hapus($where, 'soal');
    $this->Staff_model->hapus($where, 'soal_ujian');
    $this->Staff_model->hapus($where, 'nilai_ujian');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('guru/soal_ujian_online');
}

public function hapus_prestasi(){
    $id_prestasi = $this->input->post('id_prestasi');
    $where = array('id_prestasi' => $id_prestasi);
    $this->Staff_model->hapus($where, 'prestasi');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('guru/rekap_prestasi');
}

public function edit_sanksi(){
    $id_sanksi = $this->input->post('id_sanksi');
    $data['title'] = "Edit Sanksi";
    $data['lists'] = $this->Staff_model->ambil_data_id($id_sanksi,'id_sanksi','sanksi');
    $this->load->view('guru/edit_sanksi',$data);
}

public function edit_prestasi(){
    $id_prestasi = $this->input->post('id_prestasi');
    $data['title'] = "Edit Prestasi";
    $data['lists'] = $this->Staff_model->ambil_data_id($id_prestasi,'id_prestasi','prestasi');
    $this->load->view('guru/edit_prestasi',$data);
}

public function aksi_edit_sanksi(){
    $id_ksanksi = $this->input->post('id_ksanksi');
    $penanganan = $this->input->post('penanganan');
    $id_sanksi = $this->input->post('id_sanksi');

    $data = array(
        'penanganan' => $penanganan,
        'id_ksanksi' => $id_ksanksi,
    );
    $where = array('id_sanksi' => $id_sanksi);
    $this->Staff_model->save_edit($data, $where, 'sanksi');

    redirect('guru/rekap_sanksi');
}

public function aksi_edit_prestasi(){
    $id_prestasi = $this->input->post('id_prestasi');
    $isi = $this->input->post('isi');

    $data = array(
        'isi' => $isi,
    );
    $where = array('id_prestasi' => $id_prestasi);
    $this->Staff_model->save_edit($data, $where, 'prestasi');

    redirect('guru/rekap_prestasi');
}

public function tambah_soal_ujian($id_soal){
    $data['title'] = "Tambah soal ujian";
    $data['id_soal'] = $id_soal;
    $this->load->view('guru/tambah_soal_ujian',$data);
}

public function daftar_soal_ujian($id_soal){
    $data['title'] = "Daftar soal ujian";
    $data['id_soal'] = $id_soal;
    $this->load->view('guru/daftar_soal',$data);
}

public function aksi_tambah_soal(){
    $id_pelajaran = $this->input->post('id_pelajaran');
    $id_kurikulum = $this->input->post('id_kurikulum');
    $catatan = $this->input->post('catatan');

    $kurikulum = $this->Staff_model->ambil_data_id($id_kurikulum,'id_kurikulum','kurikulum');


    $data = array(
        'id_pelajaran' => $kurikulum->id_pelajaran,
        'id_kelas' => $kurikulum->id_kelas,
        'catatan' => $catatan,
        'status' => 'off',
    );
    $this->Staff_model->save_tambah($data, 'soal');

    redirect('guru/soal_ujian_online');
}

public function aksi_tambah_soal_ujian(){
    $isi = $this->input->post('isi');
    $a = $this->input->post('a');
    $b = $this->input->post('b');
    $c = $this->input->post('c');
    $d = $this->input->post('d');
    $e = $this->input->post('e');
    $jawaban = $this->input->post('jawaban');
    $id_soal = $this->input->post('id_soal');
    $data = array();

    $index = 0;
    foreach($isi as $data_isi){
        array_push($data, array(
            'isi'=>$data_isi,
            'id_soal'=>$id_soal,
            'a'=>$a[$index],
            'b'=>$b[$index],
            'c'=>$c[$index],
            'd'=>$d[$index],
            'e'=>$e[$index],
            'jawaban'=>$jawaban[$index],
        ));

        $index++;
    }
    $this->Staff_model->save_batch($data, 'soal_ujian');

    redirect('guru/soal_ujian_online');
}

public function soal_on($id_soal){

    $data = array(
        'status' => 'on',
    );
    $where = array('id_soal' => $id_soal);
    $this->Staff_model->save_edit($data, $where, 'soal');


    redirect('guru/soal_ujian_online');
}

public function soal_off($id_soal){

    $data = array(
        'status' => 'off',
    );
    $where = array('id_soal' => $id_soal);
    $this->Staff_model->save_edit($data, $where, 'soal');


    redirect('guru/soal_ujian_online');
}

public function aksi_sms_ortu(){
    $nama = $this->input->post('nama');
    $tindakan = $this->input->post('tindakan');
    $telp_ortu = $this->input->post('telp_ortu');
    $penanganan = $this->input->post('penanganan');
    $kata = "SMAS Kalam Kudus Pekanbaru, Diinformasikan ananda ".$nama.", melakukan pelanggaran ".$tindakan.". Sanksinya adalah ".$penanganan.".";

    $fields_string  =   "";
        $fields     =   array(
                            'api_key'       =>  '61d17579',
                            'api_secret'    =>  'fSNy2wT6FjPKUv2V',
                            'to'            =>  '+62'.substr($telp_ortu, 1),
                            'from'          =>  "NEXMO",
                            'text'          =>  $kata
        );
        $url        =   "https://rest.nexmo.com/sms/json";

        //url-ify the data for the POST
    foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&'; 
            }
    rtrim($fields_string, '&');

        //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);

    // $kata = "SMAS Kalam Kudus Pekanbaru, Diinformasikan ananda .".$nama.", melakukan pelanggaran ".$tindakan.". Sanksinya adalah ".$penanganan.".";
        echo "<pre>";
        print_r($result); 
        echo "</pre>";
    // if ($result) {
    // $this->session->set_flashdata('success', "Pesan telah dikirimkan ke Orang Tua/Wali Murid.");
    // redirect('guru/rekap_sanksi');
    // }else{
    // $this->session->set_flashdata('error', "Pesan Gagal dikirimkan ke Orang Tua/Wali Murid.");
    // }
}


public function soal_ujian_online_nilai($id_soal,$id_kelas){
    $data['title'] = "Nilai Ujian Online";
    $data['lists'] = $this->Staff_model->ambil_data_id_array($id_soal,'id_soal','nilai_ujian');
    $data['id_kelas'] = $id_kelas;
    $data['id_soal'] = $id_soal;
    $this->load->view('guru/soal_ujian_online_nilai',$data);
}

public function tambah_soal_ujian_online(){
    $data['title'] = "Tambah Soal Ujian Online";
    $this->load->view('guru/tambah_soal_ujian_online',$data);
}
}
