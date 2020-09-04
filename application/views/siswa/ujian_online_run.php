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
              <form method="POST" action="<?php echo base_url().'siswa/aksi_ujian_online_run'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Soal Ujian</h4>
                  </div>
                  <div class="card-body">
                    <?php 
                    $soal = $this->Staff_model->ambil_data_id_array($id_soal,'id_soal','soal_ujian');
                    $index = 1;
                    foreach ($soal as $data) {
                    ?>
                    <div class="form-group">
                      <label><?php echo $index.'. '.$data['isi']; $index++;  ?></label><br>

                      <input type="hidden" name="nis" value="<?php echo $_SESSION['nis']; ?>">
                      <input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>">
                      <input type="hidden" name="kunci[]" value="<?php echo $data['jawaban']; ?>">

                      <select name="jawaban[]" class="form-control">
                        <option value="a">A. <?php echo $data['a']; ?></option>
                        <option value="b">B. <?php echo $data['b']; ?></option>
                        <option value="c">C. <?php echo $data['c']; ?></option>
                        <option value="d">D. <?php echo $data['d']; ?></option>
                        <option value="e">E. <?php echo $data['e']; ?></option>
                      </select>
                    </div>
                    <?php
                    }
                     ?>

                    
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
                    <h4>Durasi</h4>
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