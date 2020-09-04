        <?php
        defined('BASEPATH') OR exit('No direct script access allowed');

        class Bk extends CI_Controller {

         function __construct()
         {
            parent::__construct();
            $this->load->model('Staff_model');
        }

        public function index() {
          $data = array(
           'title' => "General Dashboard"
       );
          $this->load->view('bk/home', $data);
      }

      public function home(){
        $data['title'] = "Dashboard";
        $this->load->view('bk/home',$data);
    }

    public function rekap_sanksi(){
        $data['title'] = "Rekap Sanksi";
        $data['lists'] = $this->Staff_model->ambil_data_semua('sanksi');
        $this->load->view('bk/rekap_sanksi',$data);
    }

    public function kategori_sanksi(){
        $data['title'] = "Kategori Sanksi";
        $data['lists'] = $this->Staff_model->ambil_data_semua('kategori_sanksi');
        $this->load->view('bk/kategori_sanksi',$data);
    }

    public function edit_kategori_sanksi($id_ksanksi){
        $data['title'] = "Tambah Sanksi";
        $data['lists'] = $this->Staff_model->ambil_data_id($id_ksanksi,'id_ksanksi','kategori_sanksi');
        $this->load->view('bk/edit_kategori_sanksi',$data);
    }

    public function tambah_kategori_sanksi(){
        $data['title'] = "Tambah Kategori Sanksi";
        $this->load->view('bk/tambah_kategori_sanksi',$data);
    }

    public function aksi_tambah_kategori_sanksi(){
        $level = $this->input->post('level');
        $sublevel = $this->input->post('sublevel');

        $data = array(
            'level' => $level,
            'sublevel' => $sublevel,
        );
        $this->Staff_model->save_tambah($data, 'kategori_sanksi');

        redirect('bk/kategori_sanksi');
    }

    public function aksi_edit_kategori_sanksi(){
        $id_ksanksi = $this->input->post('id_ksanksi');
        $level = $this->input->post('level');
        $sublevel = $this->input->post('sublevel');

        $data = array(
            'level' => $level,
            'sublevel' => $sublevel,
        );
        $where = array('id_ksanksi' => $id_ksanksi);
        $this->Staff_model->save_edit($data, $where, 'kategori_sanksi');

        redirect('bk/kategori_sanksi');
    }

    public function hapus_kategori_sanksi($id_ksanksi)
    {
        $where = array('id_ksanksi' => $id_ksanksi);
        $this->Staff_model->hapus($where, 'sanksi');
        $this->Staff_model->hapus($where, 'kategori_sanksi');
        $this->session->set_flashdata('success', "Delete data success!");
        redirect('bk/kategori_sanksi');
    }

    public function tambah_sanksi(){
        $data['title'] = "Tambah Sanksi";
        $this->load->view('bk/tambah_sanksi',$data);
    }

    public function edit_sanksi(){
        $id_sanksi = $this->input->post('id_sanksi');
        $data['title'] = "Tambah Sanksi";
        $data['lists'] = $this->Staff_model->ambil_data_id($id_sanksi,'id_sanksi','sanksi');
        $this->load->view('bk/edit_sanksi',$data);
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

        redirect('bk/rekap_sanksi');
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

        redirect('bk/rekap_sanksi');
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
            'to'            =>  '62'.substr($telp_ortu, 1),
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
        // echo "<pre>";
        // print_r($result); 
        // echo "</pre>";
        if ($result) {
            $this->session->set_flashdata('success', "Pesan telah dikirimkan ke Orang Tua/Wali Murid.");
            redirect('bk/rekap_sanksi');
        }else{
            $this->session->set_flashdata('error', "Pesan Gagal dikirimkan ke Orang Tua/Wali Murid.");
        }
    }

    public function hapus_sanksi()
    {
        $id_sanksi = $this->input->post('id_sanksi');
        $where = array('id_sanksi' => $id_sanksi);
        $this->Staff_model->hapus($where, 'sanksi');
        $this->session->set_flashdata('success', "Delete data success!");
        redirect('bk/rekap_sanksi');
    }

}
