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
              <div class="breadcrumb-item active"><a href="#">Daftar Pelajaran</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>
            <div class="row">

              <div class="col-12 col-md-6 col-lg-6">
                <form method="post" action="<?php echo base_url().'staff/aksi_tambah_pelajaran'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama Mata Pelajaran</label>
                      <input name="pelajaran" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Nilai KKM</label>
                      <select name="nilai_kkm" class="form-control">
                        <?php for ($i=7; $i <= 9 ; $i+=0.5) { 
                          ?>
                          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                          <?php
                        } ?>
                      </select>
                    </div>


                    <div class="form-group">
                      <label>Tenaga Pengajar</label>
                      <select name="nip" class="form-control">
                        <?php foreach ($lists as $data) {
                          ?>
                          <option value="<?php echo $data['nip']; ?>"><?php echo $data['nama']; ?></option>

                          <?php
                        } ?>
                      </select>
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