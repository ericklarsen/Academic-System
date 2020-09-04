    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ortu extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        $this->load->model('Staff_model');
    }


    public function index() {
      $data = array(
       'title' => "General Dashboard"
   );
      $this->load->view('login_ortu', $data);
  }


  public function home(){
    $data['title'] = "Dashboard";
    $this->load->view('orangtua/home',$data);
}

public function jadwal_pelajaran(){
    $kelas = $this->Staff_model->ambil_data_id($_SESSION['kelas'],'id_kelas','kelas');
    $data['title'] = "Jadwal Pelajaran Kelas ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['lists'] = $this->Staff_model->ambil_data_id_array($_SESSION['kelas'],'id_kelas','jadwal');
    $this->load->view('orangtua/jadwal_pelajaran',$data);
}


public function rekap_absensi(){
    $data['title'] = "Rekap Absensi";
    $this->load->view('orangtua/daftar_absensi',$data);
}

public function rekap_nilai(){
    $data['title'] = "Rekap Nilai";
    $this->load->view('orangtua/daftar_nilai',$data);
}

public function rekap_sanksi(){
    $data['title'] = "Rekap Sanksi";
    $this->load->view('orangtua/daftar_sanksi',$data);
}

public function rekap_prestasi(){
    $data['title'] = "Rekap Prestasi";
    $this->load->view('orangtua/daftar_prestasi',$data);
}

public function rekap_nilai_detail_2($id_nilai){
    $data['title'] = "Detail Nilai";
    $data['lists'] = $this->Staff_model->ambil_data_id($id_nilai,'id_nilai','nilai');
    $this->load->view('orangtua/daftar_nilai_detail',$data);
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
    $this->load->view('orangtua/daftar_absensi_detail',$data);
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
            'jabatan'=>"ortu",
            'kelas'=> $data->id_kelas,
            'status'=>"login"
        );

        $this->session->set_userdata($data_session);

        redirect('ortu/home');

            // $this->session->set_flashdata('success', "Welcome");
    }
    else{
        $this->session->set_flashdata('error', "Username/Password Salah!");
        redirect('ortu');
    }
}


public function logout()
{
    $this->session->unset_userdata('nis');
    $this->session->unset_userdata('status');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('jabatan');
    $this->session->set_flashdata('logout', "Terima Kasih Telah Menggunakan Halaman Orang tua/wali");
    redirect('ortu');
}  

}
