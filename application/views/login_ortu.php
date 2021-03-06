<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header_login');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="200" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login Orang tua/Wali</h4></div>

              <div class="card-body">
                <?php if ($this->session->flashdata('success')) {
                ?>
                <div class="alert alert-warning alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <b>Success!</b> <?php echo $this->session->flashdata('success'); ?>
                  </div>
                </div>
                <?php
                } elseif ($this->session->flashdata('error')) {
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
                }?>

                <form method="POST" action="<?php echo site_url('ortu/login'); ?>" >
                  <div class="form-group">
                    <label for="email">NIS</label>
                    <input type="text" class="form-control" name="nis" tabindex="1">
                    <div class="invalid-feedback">
                      Please fill in your NIS
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
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

<?php $this->load->view('dist/_partials/js'); ?>