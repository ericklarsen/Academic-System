<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Murid</h4>
            </div>
            <div class="card-body">
              <?php $total_murid = $this->Staff_model->ambil_data_semua('user_murid'); echo count($total_murid); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Staff</h4>
            </div>
            <div class="card-body">
              <?php $total_staff = $this->Staff_model->ambil_data_semua('user_staff'); echo count($total_staff); ?>
            </div>
          </div>
        </div>
      </div>    
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kelas</h4>
            </div>
            <div class="card-body">
              <?php $total_kelas = $this->Staff_model->ambil_data_semua('kelas'); echo count($total_kelas); ?>
            </div>
          </div>
        </div>
      </div>            
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Pengumuman</h4>
            <div class="card-header-action">
              <div class="btn-group">
                <a href="#" class="btn btn-primary">Harap dibaca!</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <ul class="list-unstyled list-unstyled-border">
            <?php $pengumuman = $this->Staff_model->ambil_data_semua('pengumuman'); ?>
              <?php 
              foreach ($pengumuman as $data) {
               ?>
              <li class="media">
                <div class="media-body">
                  <div class="badge badge-pill badge-danger mb-1 float-right"><?php echo $data['tanggal']; ?></div>
                  <h6 class="media-title"><a href="#"><?php echo $data['judul']; ?></a></h6>
                  <div class="text-small text-muted">
                    <?php echo $data['isi']; ?>
                  </div>
                </li>
               <?php
              }
               ?>
              </ul>
            </div>
          </div>
        </div>

      </div>
      
      
</section>
</div>
<?php $this->load->view('assets/footer'); ?>