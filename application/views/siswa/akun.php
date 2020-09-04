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
    <?php $data = $this->Staff_model->ambil_data_id($_SESSION['nis'],'nis','user_murid'); ?>                      
    <div class="section-body">
      <h2 class="section-title">Hi, <?php echo $data->nama; ?>!</h2>
      <p class="section-lead">
        Ubah informasi dari akun anda dihalaman ini.
      </p>

      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <form method="post" action="<?php echo base_url().'siswa/aksi_ubah_data'; ?>">
              <div class="card-header">
                <h4>Ubah Data Diri</h4>
              </div>
              <div class="card-body">
                <div class="row">         
                  <div class="form-group col-md-4 col-12">
                    <label>NIS</label>
                    <input type="text" class="form-control" value="<?php echo $data->nis; ?>" disabled>
                    <input type="hidden" name="nis" class="form-control" value="<?php echo $data->nis; ?>" >
                    
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Kelas</label>
                    <input type="text" class="form-control" value="<?php 
                    $data2 = $this->Staff_model->ambil_data_id($data->id_kelas,'id_kelas','kelas');
                    echo $data2->tingkat.' '.strtoupper($data2->jurusan).' '.strtoupper($data2->kelas); ?>" disabled>
                  </div>
                  <div class="form-group col-md-4 col-12">
                    <label>Semester</label>
                    <input type="text" class="form-control" value="<?php echo $data2->semester; ?>" disabled>
                  </div>

                  <div class="form-group col-md-6 col-12">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $data->nama; ?>" >
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $data->password; ?>">
                  </div>
                </div>
                <div class="row">

                  <div class="form-group col-md-6 col-12">
                    <label>Telp. Pribadi</label>
                    <input type="text" name="telp" class="form-control" value="<?php echo $data->telp; ?>">
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>Telp. Orang Tua</label>
                    <input type="text" name="telp_ortu" class="form-control" value="<?php echo $data->telp_ortu; ?>">
                  </div>
                </div>

                <div class="row">

                  <div class="form-group col-md-12 col-12">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?php echo $data->alamat; ?>" >
                  </div>
                </div>

              </div>
              <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan perubahan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('assets/footer'); ?>