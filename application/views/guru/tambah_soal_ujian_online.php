<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?php echo $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kesiswaan</a></div>
        <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
      </div>
    </div>
    <div class="row">

      <div class="col-12 col-md-6 col-lg-6">
        <form method="post" action="<?php echo base_url().'/guru/aksi_tambah_soal'; ?>">

          <div class="card">
            <div class="card-header">
              <h4>Form Data</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label>Untuk Kelas</label>
                <select name="id_kurikulum" class="form-control">
                  <?php 
                  $cek1 = $this->Staff_model->ambil_data_id_array($_SESSION['nip'],'nip','pelajaran');
                  if($cek1){
                    foreach ($cek1 as $data) {
                      $cek2 = $this->Staff_model->ambil_data_id_array($data['id_pelajaran'],'id_pelajaran','kurikulum');
                      if($cek2){
                        foreach ($cek2 as $data2) {
                      $cek3 = $this->Staff_model->ambil_data_id($data2['id_kelas'],'id_kelas','soal');
                      if(!$cek3){
                        ?>
                        
                        <option value="<?php echo $data2['id_kurikulum']; ?>">
                          <?php
                          $nama = $this->Staff_model->ambil_data_id($data2['id_kelas'],'id_kelas','kelas'); 
                          echo $nama->tingkat.' '.strtoupper($nama->jurusan).' '.strtoupper($nama->kelas).' - '.$data['nama'];
                          ?>
                        </option>
                        <?php
                      }
                    }
                      }
                    }
                  }
                  ?>
                </select>
              </div>

              <div class="form-group">
                <label>Catatan</label>
                <input name="catatan" type="text" class="form-control">
              </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </div>

        </form>
      </div>
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Note</h4>
          </div>
          <div class="card-body">
            <div class="alert alert-info">
              <b>Perhatian!</b> Harap mengisi data dengan data yang lengkap.
            </div>

          </div>
        </div>

      </div>
    </div>


  </div>
</section>
</div>
<?php $this->load->view('assets/footer'); ?>