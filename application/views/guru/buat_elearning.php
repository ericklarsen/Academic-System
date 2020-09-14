<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
        <form method="post" action="<?php echo base_url() . '/guru/aksi_buat_elearning'; ?>">

          <div class="card">
            <div class="card-header">
              <h4>Form Data</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label>Untuk Tingkat</label>
                <select name="tingkat" class="form-control">
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              

              <div class="form-group">
                <label>Topik</label>
                <input type="text" name="topik"  class="form-control"/>
              </div>

              <div class="form-group">
                <label>Deskripsi E-Learning</label>
                <textarea name="deskripsi"  class="form-control"></textarea>
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