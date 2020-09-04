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
                <form method="POST" action="<?php  echo base_url().'staff/aksi_tambah_kelas'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tingkat</label>
                      <select name="tingkat" class="form-control">
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Semester</label>
                      <select name="semester" class="form-control">
                        <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jurusan</label>
                      <select name="jurusan" class="form-control">
                        <option value="ipa">IPA</option>
                        <option value="ips">IPS</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Nama Kelas</label>
                      <input type="text" class="form-control" name="kelas">
                    </div>

                    <div class="form-group">
                      <label>Wali Kelas</label>
                      <select name="nip" class="form-control">
                        <?php foreach ($lists as $data) {
                          $cek= $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'kelas');

                          if ($data['jabatan'] == 'guru' && !$cek) {
                          ?>
                          <option value="<?php echo $data['nip']; ?>"><?php echo $data['nama']; ?></option>

                          <?php
                          }
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