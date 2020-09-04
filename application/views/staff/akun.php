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
        <div class="breadcrumb-item active"><a href="#">Akun</a></div>
        <div class="breadcrumb-item"><?php echo $title; ?></div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, <?php echo $_SESSION['nama']; ?>!</h2>
      <p class="section-lead">
        Ubah informasi dari akun anda dihalaman ini.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <form method="post" action="<?php echo base_url().'staff/aksi_akun_edit'; ?>">
          <div class="card">
              <div class="card-header">
                <h4>Ubah Data Diri</h4>
              </div>
              <div class="card-body">
                <?php $data = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','user_staff'); ?>
                <div class="row">                               
                  <div class="form-group col-md-6 col-12">
                    <label>NIP</label>
                    <input type="text" class="form-control" value="<?php echo $data->nip; ?>" disabled>
                    <input type="hidden" name="nip" class="form-control" value="<?php echo $data->nip; ?>">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data->nama; ?>" required="">
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-4 col-12">
                    <label>Password Akun</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $data->password; ?>" required="">
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Telp</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $data->telp; ?>">
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" value="<?php echo $data->jabatan; ?>" disabled>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan perubahan</button>
              </div>
          </div>
            </form>

        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('assets/footer'); ?>