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
        <form method="post" action="<?php echo base_url().'guru/aksi_isi_nilai_sikap'; ?>">
        <div class="card">
          <div class="card-header">
            <h4>Nilai Sikap - <?php echo $nama; ?></h4>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label><b><i>Sikap Spritual</i></b></label>
              <select name="spritual" class="form-control">
                <option value="3">Baik</option>
                <option value="2">Cukup</option>
                <option value="1">Kurang Baik</option>
              </select>
              <br>

              <input type="hidden" name="nis" value="<?php echo $nis; ?>">
              <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran; ?>">
              <?php 
                $tingkat = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
                 ?>
                <input type="hidden" name="id_kelas" class="form-control" value="<?php echo $id_kelas; ?>">
                <input type="hidden" name="tingkat" class="form-control" value="<?php echo $tingkat->tingkat; ?>">
                <input type="hidden" name="semester" class="form-control" value="<?php echo $tingkat->semester; ?>">

              <label><b><i>Sikap Sosial</i></b></label>
              <select name="sosial" class="form-control">
                <option value="3">Baik</option>
                <option value="2">Cukup</option>
                <option value="1">Kurang Baik</option>
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