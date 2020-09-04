<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header_login');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4><?php echo $title;  ?> Murid</h4>

              </div>
              <div class="card-header">
                <p>Harap mengisi seluruh data dengan teliti!</p>     

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

                <form method="POST" action="<?php echo base_url().'siswa/aksi_registrasi_akun'; ?>">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">NIS</label>
                      <input id="frist_name" name="nis" type="text" class="form-control" name="frist_name">
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Nama Lengkap</label>
                      <input id="last_name" name="nama" type="text" class="form-control" name="last_name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Alamat</label>
                    <input id="email" type="alamat" class="form-control" name="alamat">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password2">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Telp. Pribadi</label>
                      <input id="password" type="text" class="form-control" name="telp_pribadi">
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Telp. Orang tua/Wali</label>
                      <input id="password2" type="text" class="form-control" name="telp_ortu">
                    </div>
                  </div>

                  <div class="form-divider">
                    Informasi Akademik
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label>Kelas saat ini</label>
                      <select name="id_kelas" class="form-control selectric">
                        <?php $data_kelas = $this->Staff_model->ambil_data_semua('kelas'); ?>
                        <?php foreach ($data_kelas as $data) {
                          ?>
                          <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?></option>
                          <?php
                        } ?>
                      </select>
                    </div>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; SMAS Kalam Kudus
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('assets/js'); ?>