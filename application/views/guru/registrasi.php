<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $title;?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#"></a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <?php 
          $kelas = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas'); ?>

          <?php 
          if ($this->session->flashdata('success')) {
            ?>
            <div class="alert alert-warning alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                <b>Success!</b> Registrasi semester berhasil!
              </div>
            </div>
            <?php
          } 
          ?>

          <h2 class="section-title">Lanjut ke Semester Genap</h2>
            <p class="section-lead">
              Berikut adalah halaman untuk mengubah semester kelas ke semester genap.
            </p>
                  <a href="<?php echo base_url().'guru/aksi_regis_semester/'.$kelas->id_kelas; ?>" class="btn btn-primary mr-1" type="submit">Lanjutkan</a>


            <div class="row">
            </div>


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>