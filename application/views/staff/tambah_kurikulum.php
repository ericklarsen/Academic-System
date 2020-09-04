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
                <form  method="post" action="<?php echo base_url().'staff/aksi_tambah_kurikulum'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                      <label>Tingkat Kelas</label>
                      <select name="id_kelas" class="form-control">
                       <?php $kelas = $this->Staff_model->ambil_data_semua('kelas'); ?>
                       <?php foreach ($kelas as $data) {
                        $cek = $this->Staff_model->ambil_data_id($data['id_kelas'],'id_kelas','kurikulum');
                        if ($cek == null) {
                        ?>
                       <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?></option>
                        <?php
                        }
                       } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="d-block">Daftar Pelajaran</label>
                      <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                      <?php foreach ($pelajaran as $data) {
                      ?>
                      <div class="form-check">
                        <input class="form-check-input" name="id_pelajaran[]" value="<?php echo $data['id_pelajaran']; ?>" type="checkbox" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          <?php echo $data['nama']; ?>
                        </label>
                        <label class="form-check-label" for="defaultCheck1">
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); echo ', '; ?>
                        </label>
                        <label>
                          <b><?php echo $guru->nama; ?></b>
                        </label>
                      </div>
                      <?php
                      } ?>
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