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
        <form method="post" action="<?php echo base_url().'staff/aksi_tambah_murid' ?>">
        <div class="card">
          <div class="card-header">
            <h4>Form Data</h4>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label>NIS</label>
              <input name="nis" type="text" class="form-control">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control">
            </div>

            <div class="form-group">
              <label>Nama Lengkap</label>
              <input name="nama" type="text" class="form-control">
            </div>

            <div class="form-group">
              <label>Kelas</label>
              <select name="id_kelas" class="form-control selectric">
                <?php $data_kelas = $this->Staff_model->ambil_data_semua('kelas'); ?>
                <?php foreach ($data_kelas as $data) {
                  ?>
                  <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?></option>
                  <?php
                } ?>
              </select>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input name="alamat" type="text" class="form-control">
            </div>

            <div class="form-group">
              <label>Telp. Pribadi</label>
              <input name="telp_pribadi" type="text" class="form-control">
            </div>

            <div class="form-group">
              <label>Telp. Orang Tua/Wali</label>
              <input name="telp_ortu" type="text" class="form-control">
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
            <?php if ($this->session->flashdata('error')) {
              ?>
              <div class="alert alert-warning alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                  </button>
                  <b>Error!</b> <?php echo $this->session->flashdata('error'); ?>
                </div>
              </div>
              <?php
            } ?>
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