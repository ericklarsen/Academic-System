    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class kepsek extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        $this->load->model('Staff_model');
    }


    public function index() {
      $data = array(
       'title' => "General Dashboard"
   );
      $this->load->view('login_kepsek', $data);
  }


  public function home(){
    $data['title'] = "Dashboard";
    $this->load->view('kepsek/home',$data);
}

public function jadwal_pelajaran_list(){
    $data['title'] = "Jadwal Pelajaran Kelas ";
    $this->load->view('kepsek/jadwal_pelajaran_list',$data);
}

public function jadwal_pelajaran($id_kelas){
    $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $data['id_kelas'] = $id_kelas;
    $data['title'] = "Jadwal Pelajaran Kelas ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['lists'] = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','jadwal');
    $this->load->view('kepsek/jadwal_pelajaran',$data);
}


public function rekap_absensi_list(){
    $data['title'] = "Rekap Absensi";
    $this->load->view('kepsek/daftar_absensi_list',$data);
}

public function rekap_absensi($id_kelas){
    $data['title'] = "Rekap Absensi";
    $data['id_kelas'] = $id_kelas;
    $this->load->view('kepsek/daftar_absensi',$data);
}


public function rekap_nilai_list(){
    $data['title'] = "Rekap Nilai";
    $this->load->view('kepsek/daftar_nilai_list',$data);
}

public function rekap_nilai($id_kelas){
    $data['title'] = "Daftar Nilai";
    $data['id_kelas'] = $id_kelas;
    $cek1 = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $data['kelas'] = $cek1->tingkat.' '.strtoupper($cek1->jurusan).' '.strtoupper($cek1->kelas);
    $data['lists1'] = $this->Staff_model->ambil_data_id_array_2($cek1->tingkat,'tingkat','ganjil','semester','nilai');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array_2($cek1->tingkat,'tingkat','genap','semester','nilai');
    $this->load->view('kepsek/daftar_nilai',$data);
}

public function rekap_sanksi(){
    $data['title'] = "Rekap Sanksi";
    $this->load->view('kepsek/daftar_sanksi',$data);
}

public function rekap_prestasi(){
    $data['title'] = "Rekap Prestasi";
    $this->load->view('kepsek/daftar_prestasi',$data);
}

public function rekap_nilai_detail_2($id_nilai){
    $data['title'] = "Detail Nilai";
    $data['lists'] = $this->Staff_model->ambil_data_id($id_nilai,'id_nilai','nilai');
    $this->load->view('kepsek/daftar_nilai_detail',$data);
}

public function rekap_absensi_detail($id_pelajaran, $id_kelas){
    $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $pelajaran = $this->Staff_model->ambil_data_id($id_pelajaran,'id_pelajaran','pelajaran');
    $data['title2'] = "Daftar Absensi ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['title3'] = $pelajaran->nama;
    $data['lists'] = $this->Staff_model->ambil_data_semua_4($id_kelas,'tanggal, keterangan, pertemuan, id_pelajaran, nis','id_kelas',$id_pelajaran,'id_pelajaran','absensi');
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $data['title'] = "Absensi";
    $this->load->view('kepsek/daftar_absensi_detail',$data);
}

public function login(){
    $nis=$this->input->post('nis');
    $password=$this->input->post('password');

    $where=array (
        'nis'=> $nis,
        'password' => $password
    );

    $cek= $this->Staff_model->cek_login($where,'user_murid')->num_rows();
    $data= $this->Staff_model->ambil_data_id($nis,'nis','user_murid');

    if ($cek > 0){
        $data_session=array(
            'nis'=>$nis,
            'nama' => $data->nama,
            'jabatan'=>"kepsek",
            'kelas'=> $data->id_kelas,
            'status'=>"login"
        );

        $this->session->set_userdata($data_session);

        redirect('kepsek/home');

            // $this->session->set_flashdata('success', "Welcome");
    }
    else{
        $this->session->set_flashdata('error', "Username/Password Salah!");
        redirect('kepsek');
    }
}


public function logout()
{
    $this->session->unset_userdata('nis');
    $this->session->unset_userdata('status');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('jabatan');
    $this->session->set_flashdata('logout', "Terima Kasih Telah Menggunakan Halaman Orang tua/wali");
    redirect('kepsek');
}  

}