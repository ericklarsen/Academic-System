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
              <div class="breadcrumb-item active"><a href="#">Kepegawaian</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?php echo base_url(); ?>staff/aksi_staff_edit">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" class="form-control" value="<?php echo $lists->nip; ?>" disabled>
                      <input type="hidden" name="nip" class="form-control" value="<?php echo $lists->nip; ?>">
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" value="<?php echo $lists->password; ?>">
                    </div>

                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $lists->nama; ?>">
                    </div>

                    <div class="form-group">
                      <label>Telp</label>
                      <input type="text" name="telp" class="form-control" value="<?php echo $lists->telp; ?>">
                    </div>

                    <div class="form-group">
                      <label>Jabatan</label>
                      <select name="jabatan" class="form-control">
                        <option value="guru" <?php if($lists->jabatan == "guru") echo "selected"; ?>>Guru</option>
                        <option value="tu" <?php if($lists->jabatan == "tu") echo "selected"; ?>>Tata Usaha</option>
                        <option value="kepsek" <?php if($lists->jabatan == "kepsek") echo "selected"; ?>>Kepala Sekolah</option>
                        <option value="bk" <?php if($lists->jabatan == "bk") echo "selected"; ?>>BK</option>
                        <option value="kesiswaan" <?php if($lists->jabatan == "kesiswaan") echo "selected"; ?>>Kesiswaan</option>
                      </select>
                    </div>
                    
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                  </div>
                  </form>
                </div>

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
                        <b>Error!</b> NIP telah ada, harap inputkan NIP yang tidak sama.
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