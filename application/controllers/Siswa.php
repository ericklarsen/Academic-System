    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Siswa extends CI_Controller {

       function __construct()
       {
        parent::__construct();
        $this->load->model('Staff_model');
    }

    public function index() {
      $data = array(
         'title' => "Login Siswa"
     );
      $this->load->view('login_siswa', $data);
  }

  public function jadwal_pelajaran(){
    $data['title'] = "Jadwal Pelajaran";
    $data['lists'] = $this->Staff_model->ambil_data_id_array($_SESSION['kelas'],'id_kelas','jadwal');
    $this->load->view('siswa/jadwal_pelajaran',$data);
}

  public function registrasi_akun(){
    $data['title'] = "Registrasi Akun";
    $this->load->view('registrasi_siswa',$data);
}

public function aksi_registrasi_akun(){
    $nis = $this->input->post('nis');
    $password = $this->input->post('password');
    $password2 = $this->input->post('password2');
    $nama = $this->input->post('nama');
    $telp_pribadi = $this->input->post('telp_pribadi');
    $telp_ortu = $this->input->post('telp_ortu');
    $alamat = $this->input->post('alamat');
    $id_kelas = $this->input->post('id_kelas');

    $data_tes= $this->Staff_model->ambil_data_id($nis,'nis','user_murid');

    $data = array(
        'nis' => $nis,
        'nama' => $nama,
        'password' => $password,
        'telp' => $telp_pribadi,
        'telp_ortu' => $telp_ortu,
        'alamat' => $alamat,
        'id_kelas' => $id_kelas,
        'status' => 'pending',
    );

    if ($data_tes->nis != $nis) {
        if ($password == $password2 &&  $password != null &&  $password2 != null) {
            $this->session->set_flashdata('success', "Registrasi Berhasil, harap meminta bagian Tata Usaha untuk mengaktifkan akun anda.");
            $this->Staff_model->save_tambah($data, 'user_murid');
            redirect('siswa');
        }elseif($nama == null || $alamat == null || $telp_pribadi == null || $telp_ortu == null){
            $this->session->set_flashdata('error', "Harap mengisi seluruh kolom data yang disediakan.");
            redirect('siswa/registrasi_akun');
        }else{
            $this->session->set_flashdata('error', "Harap mengecek bagian password, data yang diinputkan tidak sama.");
            redirect('siswa/registrasi_akun');
        }
        
    }else{
        $this->session->set_flashdata('error', "NIS telah ada, harap menginputkan NIS anda sendiri.");
        redirect('siswa/registrasi_akun');
    }
}

public function home(){
    $data['title'] = "Dashboard";
    $this->load->view('siswa/home',$data);
}

public function daftar_nilai(){
    $data['title'] = "Daftar Nilai";
    $data['nis'] = $_SESSION['nis'];
    $this->load->view('siswa/daftar_nilai',$data);
}

public function ujian_online(){
    $data['title'] = "Daftar Ujian Online";
    $this->load->view('siswa/ujian_online',$data);
}

public function ujian_online_mulai($id_soal){
    $data['title'] = "Mulai Ujian Online";
    $data['id_soal'] = $id_soal;
    $this->load->view('siswa/ujian_online_mulai',$data);
}

public function ujian_online_run($id_soal){
    $data['title'] = "Selamat Mengerjakan!";
    $data['id_soal'] = $id_soal;
    $this->load->view('siswa/ujian_online_run',$data);
}


public function ujian_online_result(){
    $data['title'] = "Selesai!";
    $this->load->view('siswa/ujian_online_result',$data);
}



public function aksi_ujian_online_run(){
    $nis = $this->input->post('nis');
    $id_soal = $this->input->post('id_soal');
    $jawaban = $this->input->post('jawaban');
    $kunci = $this->input->post('kunci');
    $nilai = 0;

    for ($i=0; $i < count($jawaban) ; $i++) { 
        if ($jawaban[$i] == $kunci[$i]) {
            $nilai++;
        }
    }

    $nilai_akhir = ($nilai / count($jawaban)) * 100;

    $data = array(
        'nis' => $nis,
        'id_soal' => $id_soal,
        'nilai' => $nilai_akhir,
    );

    $this->Staff_model->save_tambah($data, 'nilai_ujian');
    redirect('siswa/ujian_online_result');
}

public function akun(){
    $data['title'] = "Data Diri Siswa";
    $this->load->view('siswa/akun',$data);
}


public function aksi_ubah_data(){
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $telp = $this->input->post('telp');
    $telp_ortu = $this->input->post('telp_ortu');
    $alamat = $this->input->post('alamat');

    $data = array(
        'nama' => $nama,
        'telp' => $telp,
        'telp_ortu' => $telp_ortu,
        'alamat' => $alamat,
        'password' => $password,
    );

    $where = array('nis' => $nis);
    $this->Staff_model->save_edit($data, $where, 'user_murid');
    redirect('siswa/akun');
}

public function daftar_sanksi(){
    $data['title'] = "Daftar Sanksi yang Didapatkan";
    $this->load->view('siswa/daftar_sanksi',$data);
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
            'jabatan'=>"siswa",
            'status'=>"login"
        );

        $this->session->set_userdata($data_session);

        redirect('siswa/home');

            // $this->session->set_flashdata('success', "Welcome");
    }
    else{
        $this->session->set_flashdata('error', "Username/Password Salah!");
        redirect('siswa/index');
    }

}

public function logout()
{
    $this->session->unset_userdata('nis');
    $this->session->unset_userdata('status');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('jabatan');
    $this->session->set_flashdata('logout', "Terima Kasih Telah Menggunakan Halaman Admin");
    redirect('siswa');
}  
}
