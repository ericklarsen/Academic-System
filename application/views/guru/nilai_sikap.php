<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $title;?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <h2 class="section-title">Kelas 10 IPA 1</h2>
            <p class="section-lead">
              Pilih semester untuk mengisi nilai sikap.
            </p>

            <div class="form-group col-12 col-md-6 col-lg-6">
                      <label>Pilih Semester</label>
                      <div class="form-group">
                      <select class="form-control">
                        <option>Ganjil</option>
                        <option>Genap</option>
                      </select>
                    </div>
                    <a href="<?php echo base_url(); ?>guru/isi_nilai_sikap" class="btn btn-primary mr-1" type="submit">Isi Nilai</a>
                    </div>

           


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>