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
                <form method="post" action="<?php echo base_url().'/guru/aksi_tambah_soal_ujian'; ?>">
                  
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>No. 1</label>
                      <input name="isi[]" type="text" class="form-control" placeholder="Soal . . .">
                      <br>
                      <input name="a[]" type="text" class="form-control" placeholder="Option A">
                      <br>
                      <input name="b[]" type="text" class="form-control" placeholder="Option B">
                      <br>
                      <input name="c[]" type="text" class="form-control" placeholder="Option C">
                      <br>
                      <input name="d[]" type="text" class="form-control" placeholder="Option D">
                      <br>
                      <input name="e[]" type="text" class="form-control" placeholder="Option E">
                      <br>
                      <label>Jawaban</label>
                      <select name="jawaban[]" class="form-control">
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                        <option value="e">E</option>
                      </select>
                    </div>
                    <br>

                    <div id="insert-soal"></div>
                    <input type="hidden" id="jumlah-form" value="2">
                    <input type="hidden" name="id_soal" value="<?php echo $id_soal; ?>">

                    <button id="btn-tambah-soal" class="btn btn-primary mr-1" type="button">Tambah Soal</button>
                    
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