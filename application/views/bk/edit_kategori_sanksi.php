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
              <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="POST" action="<?php echo base_url().'/bk/aksi_edit_kategori_sanksi'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Level</label>
                      <select name="level" class="form-control">
                        <option value="Rendah" <?php if($lists->level == 'Rendah') echo 'selected'; ?>>Rendah</option>
                        <option value="Sedang" <?php if($lists->level == 'Sedang') echo 'selected'; ?>>Sedang</option>
                        <option value="Tinggi" <?php if($lists->level == 'Tinggi') echo 'selected'; ?>>Tinggi</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tindakan yang dilakukan</label>
                      <input type="text" name="sublevel" class="form-control" value="<?php echo $lists->sublevel; ?>">
                      <input type="hidden" name="id_ksanksi" class="form-control" value="<?php echo $lists->id_ksanksi; ?>">
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