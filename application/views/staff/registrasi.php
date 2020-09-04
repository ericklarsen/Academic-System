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

          <h2 class="section-title">Registrasi Semester</h2>
            <p class="section-lead">
              Berikut adalah halaman untuk mengaktifkan fitur registrasi untuk seluruh siswa/siswi.
            </p>
                  <?php foreach ($lists as $data) {
                   if ($data['status'] == 'on') {
                    ?>
                  <a href="<?php echo base_url().'staff/regis_off/'.$data['id_registrasi_semester']; ?>" class="btn btn-danger mr-1" type="submit">Non-Aktifkan</a>
                  <b><i>Status saat ini "Aktif".</i></b>
                    <?php
                   }else{
                    ?>
                  <a href="<?php echo base_url().'staff/regis_on/'.$data['id_registrasi_semester']; ?>" class="btn btn-primary mr-1" type="submit">Aktifkan</a>
                  <b><i>Status saat ini "Tidak Aktif".</i></b>
                    <?php
                   }
                  } ?>


            <div class="row">
            </div>


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>