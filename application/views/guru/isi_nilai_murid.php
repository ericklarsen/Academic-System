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
        <form method="post" action="<?php echo base_url().'guru/aksi_isi_nilai_murid'; ?>">
          <div class="card">
            <div class="card-header">
              <h4>Form Data</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" value="<?php $nama_murid = $this->Staff_model->ambil_data_id($nis,'nis','user_murid'); echo $nama_murid->nama; ?>" disabled>
                <input type="hidden" name="nis" class="form-control" value="<?php echo $nis; ?>">
                <input type="hidden" name="id_pelajaran" class="form-control" value="<?php echo $id_pelajaran; ?>">
                <?php 
                $tingkat = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
                 ?>
                <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $id_kelas; ?>">
                <input type="hidden" name="tingkat" class="form-control" value="<?php echo $tingkat->tingkat; ?>">
                <input type="hidden" name="semester" class="form-control" value="<?php echo $tingkat->semester; ?>">
              </div>

              <div class="form-group">
                <label>Nilai UH</label>
                <input type="text" name="uh[]" class="form-control" value="<?php if($lists) echo $lists->uh; ?>">
                <div id="insert-uh"></div>
                <br>
              <button type="button" id="btn-tambah-uh" class="btn btn-primary mr-1">Tambah UH</button>
              <button type="button" id="btn-reset-uh" class="btn btn-info mr-1">Reset</button>

              </div>



              <div class="form-group">
                <label>Nilai Lisan</label>
                <input type="text" name="lisan[]" class="form-control" value="<?php if($lists) echo $lists->lisan; ?>">
                <div id="insert-lisan"></div>
                <br>
              <button type="button" id="btn-tambah-lisan" class="btn btn-primary mr-1">Tambah Lisan</button>
              <button type="button" id="btn-reset-lisan" class="btn btn-info mr-1">Reset</button>
              </div>


              <div class="form-group">
                <label>Nilai Tugas</label>
                <input type="text" name="tugas[]" class="form-control" value="<?php if($lists) echo $lists->tugas; ?>">
                <div id="insert-tugas"></div>
                <br>
              <button type="button" id="btn-tambah-tugas" class="btn btn-primary mr-1">Tambah Tugas</button>
              <button type="button" id="btn-reset-tugas" class="btn btn-info mr-1">Reset</button>

              </div>

              <div class="form-group">
                <label>Nilai UTS</label>
                <input type="text" name="uts" class="form-control" value="<?php if($lists) echo $lists->uts; ?>">
                <div id="insert-uts"></div>

              </div>


              <div class="form-group">
                <label>Nilai UAS</label>
                <input type="text" name="uas" class="form-control" value="<?php if($lists) echo $lists->uas; ?>">
                <div id="insert-uas"></div>

              </div>

            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </div>
</form>
                    <input type="hidden" id="jumlah-form" value="1">

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