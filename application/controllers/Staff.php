    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Staff extends CI_Controller {

     function __construct()
     {
        parent::__construct();
        $this->load->model('Staff_model');
    }

    public function index() {
      $data = array(
       'title' => "General Dashboard"
   );
      $this->load->view('staff/home', $data);
  }


  public function home(){
    $data['title'] = "Dashboard";
    $this->load->view('staff/home',$data);
}

public function kelas(){
    $data['title'] = "Daftar Kelas";
    $data['lists'] = $this->Staff_model->ambil_data_semua('kelas');
    $this->load->view('staff/daftar_kelas',$data);
}

public function kelas_detail($id){
    $data['title'] = "Detail Kelas";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_kelas','kelas');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array($id,'id_kelas','user_murid');
    $this->load->view('staff/detail_kelas',$data);
}

public function kelas_edit($id){
    $data['title'] = "Edit Kelas";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_kelas','kelas');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array($id,'id_kelas','kelas');
    $this->load->view('staff/edit_kelas',$data);
}

public function kelas_absensi($id_kelas){
    $data['title'] = "Rekap Absensi";
    $data['id_kelas'] = $id_kelas;
    $this->load->view('staff/daftar_absensi',$data);
}

public function kelas_absensi_detail($id_pelajaran, $id_kelas){
    $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
    $pelajaran = $this->Staff_model->ambil_data_id($id_pelajaran,'id_pelajaran','pelajaran');
    $data['title2'] = "Daftar Absensi ".$kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
    $data['title3'] = $pelajaran->nama;
    $data['lists'] = $this->Staff_model->ambil_data_semua_4($id_kelas,'tanggal, pertemuan, id_pelajaran, nis','id_kelas',$id_pelajaran,'id_pelajaran','absensi');
    $data['id_kelas'] = $id_kelas;
    $data['id_pelajaran'] = $id_pelajaran;
    $data['title'] = "Absensi";
    $this->load->view('staff/daftar_absensi_detail',$data);
}


public function kelas_absensi_detail2($tanggal,$id_pelajaran,$pertemuan,$id_kelas){
    $data['title'] = "Absensi ".date("l, d F Y",strtotime($tanggal));
    $data['id_kelas'] = $id_kelas;
    $data['lists'] = $this->Staff_model->ambil_data_id_array_4($tanggal,'tanggal',$id_pelajaran,'id_pelajaran',$pertemuan,'pertemuan',$id_kelas,'id_kelas','absensi');

    $this->load->view('staff/daftar_absensi_detail2',$data);
}


public function aksi_kelas_edit(){
    $id = $this->input->post('id');
    $nip = $this->input->post('nip');
    $tingkat = $this->input->post('tingkat');
    $semester = $this->input->post('semester');
    $kelas = $this->input->post('kelas');
    $jurusan = $this->input->post('jurusan');

    $data = array(
        'nip' => $nip,
        'tingkat' => $tingkat,
        'semester' => $semester,
        'kelas' => $kelas,
        'jurusan' => $jurusan,
    );

    $where = array('id_kelas' => $id);
    $this->Staff_model->save_edit($data, $where, 'kelas');
    redirect('staff/kelas');
}

public function kelas_delete($id)
{
    $where = array('id_kelas' => $id);
    $this->Staff_model->hapus($where, 'kelas');
    $this->Staff_model->hapus($where, 'kurikulum');
    $this->Staff_model->hapus($where, 'soal');
    $this->Staff_model->hapus($where, 'absensi');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/kelas');
}

public function murid(){
    $data['title'] = "Daftar Murid";
    $data['lists'] = $this->Staff_model->ambil_data_semua('user_murid');

    $this->load->view('staff/daftar_murid',$data);
}

public function murid_edit($nis){
    $data['title'] = "Daftar Murid";
    $data['lists'] = $this->Staff_model->ambil_data_id($nis,'nis','user_murid');

    $this->load->view('staff/edit_murid',$data);
}

public function aksi_murid_edit(){
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $password = $this->input->post('password');
    $telp = $this->input->post('telp');
    $telp_ortu = $this->input->post('telp_ortu');
    $alamat = $this->input->post('alamat');
    $id_kelas = $this->input->post('id_kelas');

    $data = array(
        'nama' => $nama,
        'telp' => $telp,
        'telp_ortu' => $telp_ortu,
        'alamat' => $alamat,
        'password' => $password,
        'id_kelas' => $id_kelas,
    );

    $where = array('nis' => $nis);
    $this->Staff_model->save_edit($data, $where, 'user_murid');
    redirect('staff/murid');
}

public function murid_on($id){

    $data = array(
        'status' => 'on',
    );

    $where = array('nis' => $id);
    $this->Staff_model->save_edit($data, $where, 'user_murid');
    redirect('staff/murid');
}

public function murid_off($id){

    $data = array(
        'status' => 'off',
    );

    $where = array('nis' => $id);
    $this->Staff_model->save_edit($data, $where, 'user_murid');
    redirect('staff/murid');
}

public function aksi_tambah_murid(){
    $nis = $this->input->post('nis');
    $password = $this->input->post('password');
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
        if($nama == null || $alamat == null || $telp_pribadi == null || $telp_ortu == null || $password == null){
            $this->session->set_flashdata('error', "Harap mengisi seluruh kolom data yang disediakan.");
            redirect('staff/tambah_murid');
        }else{
            $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
            $this->Staff_model->save_tambah($data, 'user_murid');
            redirect('staff/murid');
        }
        
    }else{
        $this->session->set_flashdata('error', "NIS telah ada");
        redirect('staff/tambah_murid');
    }
}

public function kurikulum_pelajaran(){
    $data['title'] = "Daftar Pelajaran";
    $data['lists'] = $this->Staff_model->ambil_data_semua('pelajaran');
    $this->load->view('staff/kurikulum_pelajaran',$data);
}

public function jadwal_pelajaran(){
    $data['title'] = "Jadwal Pelajaran";
    $data['lists'] = $this->Staff_model->ambil_data_semua('kelas');
    $this->load->view('staff/jadwal_pelajaran',$data);
}

public function jadwal_pelajaran_delete($id)
{
    $where = array('id_kelas' => $id);
    $this->Staff_model->hapus($where, 'jadwal');
    // $this->Staff_model->hapus($where, 'kelas_detail');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/jadwal_pelajaran');
}

public function edit_jadwal_pelajaran($id){
    $data['title'] = "Edit Jadwal";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_kelas','kelas');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array($id,'id_kelas','jadwal');
    $this->load->view('staff/edit_jadwal_pelajaran',$data);
}

public function aksi_jadwal_edit(){
    $id_kelas = $this->input->post('id_kelas');
    $id_jadwal = $this->input->post('id_jadwal');
    $data_lama = array();

    $senin = $this->input->post('senin');
    $selasa = $this->input->post('selasa');
    $rabu = $this->input->post('rabu');
    $kamis = $this->input->post('kamis');
    $jumat = $this->input->post('jumat');
    $jam1 = $this->input->post('jam1');
    $jam2 = $this->input->post('jam2');
    $jam3 = $this->input->post('jam3');
    $jam4 = $this->input->post('jam4');
    $jam5 = $this->input->post('jam5');
    $data = array();
    $data2 = array();
    $data3 = array();
    $data4 = array();
    $data5 = array();

    foreach($id_jadwal as $data_jadwal){
        array_push($data_lama, $data_jadwal);
    }

    $this->Staff_model->delete_batch('id_jadwal',$data_lama,'jadwal');

    $index = 0;
    foreach($senin as $datas){
        array_push($data, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'senin',
            'jam'=>$jam1[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($selasa as $datas){
        array_push($data2, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'selasa',
            'jam'=>$jam2[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($rabu as $datas){
        array_push($data3, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'rabu',
            'jam'=>$jam3[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($kamis as $datas){
        array_push($data4, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'kamis',
            'jam'=>$jam4[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($jumat as $datas){
        array_push($data5, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'jumat',
            'jam'=>$jam5[$index],
        ));
        $index++;
    }

    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
    $this->Staff_model->save_batch($data, 'jadwal');
    $this->Staff_model->save_batch($data2, 'jadwal');
    $this->Staff_model->save_batch($data3, 'jadwal');
    $this->Staff_model->save_batch($data4, 'jadwal');
    $this->Staff_model->save_batch($data5, 'jadwal');
    redirect('staff/jadwal_pelajaran');
}

public function tambah_jadwal_pelajaran(){
    $data['title'] = "Tambah Jadwal Pelajaran";
    $this->load->view('staff/tambah_jadwal_pelajaran',$data);
}



public function aksi_tambah_jadwal(){
    $id_kelas = $this->input->post('id_kelas');
    $senin = $this->input->post('senin');
    $selasa = $this->input->post('selasa');
    $rabu = $this->input->post('rabu');
    $kamis = $this->input->post('kamis');
    $jumat = $this->input->post('jumat');
    $jam1 = $this->input->post('jam1');
    $jam2 = $this->input->post('jam2');
    $jam3 = $this->input->post('jam3');
    $jam4 = $this->input->post('jam4');
    $jam5 = $this->input->post('jam5');
    $data = array();
    $data2 = array();
    $data3 = array();
    $data4 = array();
    $data5 = array();
    $index = 0;


    foreach($senin as $datas){
        array_push($data, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'senin',
            'jam'=>$jam1[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($selasa as $datas){
        array_push($data2, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'selasa',
            'jam'=>$jam2[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($rabu as $datas){
        array_push($data3, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'rabu',
            'jam'=>$jam3[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($kamis as $datas){
        array_push($data4, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'kamis',
            'jam'=>$jam4[$index],
        ));
        $index++;
    }

    $index = 0;
    foreach($jumat as $datas){
        array_push($data5, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$datas,
            'hari'=>'jumat',
            'jam'=>$jam5[$index],
        ));
        $index++;
    }

    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
    $this->Staff_model->save_batch($data, 'jadwal');
    $this->Staff_model->save_batch($data2, 'jadwal');
    $this->Staff_model->save_batch($data3, 'jadwal');
    $this->Staff_model->save_batch($data4, 'jadwal');
    $this->Staff_model->save_batch($data5, 'jadwal');
    redirect('staff/jadwal_pelajaran');
}

public function aksi_kurikulum_edit(){
    $id_kelas = $this->input->post('id_kelas');
    $id_pelajaran = $this->input->post('id_pelajaran');
    $id_kurikulum = $this->input->post('id_kurikulum');
    $data = array();
    $data_lama = array();

    foreach($id_kurikulum as $data_kurikulum){
        array_push($data_lama, $data_kurikulum);
    }

    $this->Staff_model->delete_batch('id_kurikulum',$data_lama,'kurikulum');

    $index = 0;
    foreach($id_pelajaran as $data_pelajaran){
        array_push($data, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$data_pelajaran,
        ));

        $index++;
    }

    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
    $this->Staff_model->save_batch($data, 'kurikulum');
    redirect('staff/kurikulum_kelas');
}

public function pelajaran_edit($id){
    $data['title'] = "Edit Pelajaran";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_pelajaran','pelajaran');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array('guru','jabatan','user_staff');
    $this->load->view('staff/edit_pelajaran',$data);
}

public function aksi_pelajaran_edit(){
    $nama = $this->input->post('pelajaran');
    $nilai_kkm = $this->input->post('nilai_kkm');
    $nip = $this->input->post('nip');
    $id = $this->input->post('id');

    $data = array(
        'nip' => $nip,
        'nama' => $nama,
        'nilai_kkm' => $nilai_kkm,
    );

    $where = array('id_pelajaran' => $id);
    $this->Staff_model->save_edit($data, $where, 'pelajaran');
    redirect('staff/kurikulum_pelajaran');
}

public function tambah_pelajaran(){
    $data['title'] = "Tambah Pelajaran";
    $data['lists'] = $this->Staff_model->ambil_data_id_array('guru','jabatan','user_staff');
    $this->load->view('staff/tambah_pelajaran',$data);
}

public function aksi_tambah_pelajaran(){
    $pelajaran = $this->input->post('pelajaran');
    $nilai_kkm = $this->input->post('nilai_kkm');
    $nip = $this->input->post('nip');


    $data = array(
        'nip' => $nip,
        'nama' => $pelajaran,
        'nilai_kkm' => $nilai_kkm,
    );

    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
    $this->Staff_model->save_tambah($data, 'pelajaran');
    redirect('staff/kurikulum_pelajaran');
}

public function pelajaran_delete($id)
{
    $where = array('id_pelajaran' => $id);
    $this->Staff_model->hapus($where, 'pelajaran');
    $this->Staff_model->hapus($where, 'kurikulum');
    // $this->Staff_model->hapus($where, 'kelas_detail');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/kurikulum_pelajaran');
}

public function kurikulum_kelas(){
    $data['title'] = "Kurikulum Tingkat Kelas";
    $data['lists'] = $this->Staff_model->ambil_data_semua('kelas');
    $this->load->view('staff/kurikulum_kelas',$data);
}

public function aksi_tambah_kurikulum(){
    $id_kelas = $this->input->post('id_kelas');
    $id_pelajaran = $this->input->post('id_pelajaran');
    $data = array();

    $index = 0;
    foreach($id_pelajaran as $data_pelajaran){
        array_push($data, array(
            'id_kelas'=>$id_kelas,
            'id_pelajaran'=>$data_pelajaran,
        ));

        $index++;
    }

    // $this->session->set_flashdata('success', "Data berhasil ditambahkan.");
    $this->Staff_model->save_batch($data, 'kurikulum');
    redirect('staff/kurikulum_kelas');
}

public function kurikulum_edit($id){
    $data['title'] = "Edit Kurikulum";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_kelas','kelas');
    $data['lists2'] = $this->Staff_model->ambil_data_id_array($id,'id_kelas','kurikulum');
    $this->load->view('staff/edit_kurikulum',$data);
}


public function kurikulum_delete($id)
{
    $where = array('id_kelas' => $id);
    $this->Staff_model->hapus($where, 'kurikulum');
    // $this->Staff_model->hapus($where, 'kelas_detail');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/kurikulum_kelas');
}

public function staff(){
    $data['title'] = "Daftar Staff";
    $data['lists'] = $this->Staff_model->ambil_data_semua('user_staff');

    $this->load->view('staff/daftar_staff',$data);
}

public function staff_edit($id){
    $data['title'] = "Edit Data Staff";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'nip','user_staff');

    $this->load->view('staff/edit_staff',$data);
}

public function aksi_staff_edit(){
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');
    $jabatan = $this->input->post('jabatan');

    $data = array(
        'nama' => $nama,
        'password' => $password,
        'telp' => $telp,
        'jabatan' => $jabatan,
    );

    $where = array('nip' => $nip);
    $this->Staff_model->save_edit($data, $where, 'user_staff');
    redirect('staff/staff');
}

public function staff_delete($id)
{
    $where = array('nip' => $id);
    $this->Staff_model->hapus($where, 'user_staff');
    // $this->Staff_model->hapus($where, 'pelajaran');
    // $this->Staff_model->hapus($where, 'kelas');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/staff');
}


public function pengumuman(){
    $data['title'] = "Daftar Pengumuman";
    $data['lists'] = $this->Staff_model->ambil_data_semua('pengumuman');
    $this->load->view('staff/daftar_pengumuman',$data);
}

public function aksi_tambah_pengumuman(){
    $judul = $this->input->post('judul');
    $isi = $this->input->post('isi');


    $data = array(
        'judul' => $judul,
        'isi' => $isi,
    );

    $this->Staff_model->save_tambah($data, 'pengumuman');
    redirect('staff/pengumuman');
}

public function pengumuman_edit($id){
    $data['title'] = "Edit Pengumuman";
    $data['lists'] = $this->Staff_model->ambil_data_id($id,'id_pengumuman','pengumuman');

    $this->load->view('staff/edit_pengumuman',$data);
}

public function aksi_pengumuman_edit(){
    $id = $this->input->post('id');
    $judul = $this->input->post('judul');
    $isi = $this->input->post('isi');

    $data = array(
        'judul' => $judul,
        'isi' => $isi,
    );

    $where = array('id_pengumuman' => $id);
    $this->Staff_model->save_edit($data, $where, 'pengumuman');
    redirect('staff/pengumuman');
}

public function pengumuman_delete($id)
{
    $where = array('id_pengumuman' => $id);
    $this->Staff_model->hapus($where, 'pengumuman');
    $this->session->set_flashdata('success', "Delete data success!");
    redirect('staff/pengumuman');
}

public function akun(){
    $data['title'] = "Data Diri";
    $this->load->view('staff/akun',$data);
}

public function aksi_akun_edit(){
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');

    $data = array(
        'nama' => $nama,
        'password' => $password,
        'telp' => $telp,
    );

    $where = array('nip' => $nip);
    $this->Staff_model->save_edit($data, $where, 'user_staff');
    redirect('staff/akun');
}

public function tambah_kelas(){
    $data['title'] = "Tambah Kelas";
    $data['lists'] = $this->Staff_model->ambil_data_semua('user_staff');
    $this->load->view('staff/tambah_kelas',$data);
}

public function tambah_murid(){
    $data['title'] = "Tambah Murid";

    $this->load->view('staff/tambah_murid',$data);
}

public function tambah_kurikulum(){
    $data['title'] = "Tambah Kurikulum Tingkat Kelas";
    $this->load->view('staff/tambah_kurikulum',$data);
}

public function tambah_staff(){
    $data['title'] = "Tambah Staff";
    $this->load->view('staff/tambah_staff',$data);
}

public function tambah_pengumuman(){
    $data['title'] = "Tambah Pengumuman";
    $this->load->view('staff/tambah_pengumuman',$data);
}

public function registrasi(){
    $data['title'] = "Registrasi Semester";
    $data['lists'] = $this->Staff_model->ambil_data_semua('registrasi_semester');
    $this->load->view('staff/registrasi',$data);
}

public function regis_on($id){

    $data = array(
        'status' => 'on',
    );

    $where = array('id_registrasi_semester' => $id);
    $this->Staff_model->save_edit($data, $where, 'registrasi_semester');
    redirect('staff/registrasi');
}

public function regis_off($id){

    $data = array(
        'status' => 'off',
    );

    $where = array('id_registrasi_semester' => $id);
    $this->Staff_model->save_edit($data, $where, 'registrasi_semester');
    redirect('staff/registrasi');
}

public function login() 
{
    $nip=$this->input->post('nip');
    $password=$this->input->post('password');

    $where=array (
        'nip'=> $nip,
        'password' => $password
    );

    $cek= $this->Staff_model->cek_login($where,'user_staff')->num_rows();
    $data= $this->Staff_model->ambil_data_id($nip, 'nip', 'user_staff');

    if ($cek > 0){
        $data_session=array(
            'nip'=>$nip,
            'nama' => $data->nama,
            'jabatan' => $data->jabatan,
            'status'=>"login"
        );

        $this->session->set_userdata($data_session);

        if ($data->jabatan == "tu") {
            redirect('staff/home');
        }elseif($data->jabatan == "guru") {
            redirect('guru/home');
        }elseif($data->jabatan == "kepsek") {
            redirect('kepsek/home');
        }else{
            redirect('bk/home');
        }

            // $this->session->set_flashdata('success', "Welcome");
    }
    else{
        $this->session->set_flashdata('error', "Username/Password Salah!");
        redirect('Home');
    }

}

public function logout()
{
    $this->session->unset_userdata('nip');
    $this->session->unset_userdata('status');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('jabatan');
    $this->session->set_flashdata('logout', "Terima Kasih Telah Menggunakan Halaman Admin");
    redirect('Home');
}  

public function aksi_tambah_staff(){
    $nip = $this->input->post('nip');
    $password = $this->input->post('password');
    $nama = $this->input->post('nama');
    $telp = $this->input->post('telp');
    $jabatan = $this->input->post('jabatan');

    $data_tes= $this->Staff_model->ambil_data_id($nip,'nip','user_staff');

    $data = array(
        'nip' => $nip,
        'nama' => $nama,
        'password' => $password,
        'telp' => $telp,
        'jabatan' => $jabatan,
    );



    if ($data_tes->nip != $nip) {
        $this->Staff_model->save_tambah($data, 'user_staff');
        redirect('staff/staff');
    }else{
        $this->session->set_flashdata('error', "NIP telah ada.");
        redirect('staff/tambah_staff');
    }
}

public function aksi_tambah_kelas(){
    $nip = $this->input->post('nip');
    $tingkat = $this->input->post('tingkat');
    $semester = $this->input->post('semester');
    $jurusan = $this->input->post('jurusan');
    $kelas = $this->input->post('kelas');

    $data = array(
        'nip' => $nip,
        'tingkat' => $tingkat,
        'semester' => $semester,
        'jurusan' => $jurusan,
        'kelas' => $kelas,
    );
    $this->Staff_model->save_tambah($data, 'kelas');
    redirect('staff/kelas');

}



}
