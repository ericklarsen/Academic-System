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
                <form method="POST" action="<?php echo base_url().'/guru/aksi_tambah_sanksi'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Nama Murid</label>
                      <select name="nis" class="form-control">
                        <?php $murid = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','user_murid');
                        foreach ($murid as $data) {
                          ?>
                        <option value="<?php echo $data['nis']; ?>"><?php echo $data['nis'].'-'.$data['nama']; ?></option>
                          <?php
                         } ?>
                      </select>
                    </div>

                   <div class="form-group">
                      <label>Kategori</label>
                      <select id="kategori" class="form-control">
                        <option disabled>Pilih</option>
                        <option value="Rendah">Rendah</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Tinggi">Tinggi</option>
                      </select>
                      <br>
                    <button class="btn btn-warning mr-1" id="kategori_add" type="button">Add</button>

                    </div>

                    <div class="form-group" id="insert-subkategori">
                    </div>

                    <div class="form-group" id="insert-penanganan">
                    </div>

                    <input type="hidden" id="nilai" value="1">

                    
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