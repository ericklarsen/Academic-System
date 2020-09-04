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

          <h2 class="section-title">Durasi ujian 30 menit</h2>
            <p class="section-lead">
              Mohon sebelum memulai ujian, harap mengaktifkan screen recorder untuk menghindari kecurangan.
            </p>

                    <div class="form-group col-12 col-md-6 col-lg-6">
                    <a href="<?php echo base_url().'siswa/ujian_online_run/'.$id_soal; ?>" class="btn btn-primary mr-1" type="submit">Mulai Sekarang</a>

                    </div>

          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>