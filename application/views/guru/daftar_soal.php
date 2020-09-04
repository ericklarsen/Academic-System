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

              <div class="col-12 col-md-6 col-lg-12">
                  
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <?php $soal = $this->Staff_model->ambil_data_id_array($id_soal,'id_soal','soal_ujian');
                    $i = 1;
                    foreach ($soal as $data) {
                    ?>

                    <div class="form-group">
                      <label>No. <?php echo $i; $i++; ?></label>
                      <input type="text" class="form-control" value="<?php echo $data['isi']; ?>">
                      <br>
                      <label>Option</label>
                      <select name="jawaban[]" class="form-control">
                        <option value="a">A. <?php echo $data['a']; ?></option>
                        <option value="b">B. <?php echo $data['c']; ?></option>
                        <option value="c">C. <?php echo $data['c']; ?></option>
                        <option value="d">D. <?php echo $data['d']; ?></option>
                        <option value="e">E. <?php echo $data['e']; ?></option>
                      </select>
                    <br>
                    <label>Jawaban</label>
                      <input type="text" class="form-control" value="<?php echo $data['jawaban']; ?>">
                    </div>

                    <br>
                    <?php
                     } ?>


                    
                  </div>
                </div>

              </div>
            </div>


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>