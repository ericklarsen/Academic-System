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
                <form method="POST" action="<?php echo base_url().'/bk/aksi_edit_sanksi'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">

                    <div class="form-group">
                      <label>Murid</label>
                      <input type="text" class="form-control" name="nis" value="<?php echo $lists->nis; ?>" disabled>
                    </div>

                    <div class="form-group">
                      <label>Kategori</label>
                      <select name="id_ksanksi" class="form-control">
                        <?php $kategori = $this->Staff_model->ambil_data_semua('kategori_sanksi');
                        foreach ($kategori as $data) {
                        ?>
                        <option value="<?php echo $data['id_ksanksi'] ?>" <?php if($lists->id_ksanksi == $data['id_ksanksi'])echo 'selected'; ?>><?php echo 'Level '.$data['level'].' - '.$data['sublevel']; ?></option>
                        <?php
                         } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Penanganan</label>
                      <input type="text" name="penanganan" class="form-control" value="<?php echo $lists->penanganan; ?>">
                      <input type="hidden" name="id_sanksi" class="form-control" value="<?php echo $lists->id_sanksi; ?>">
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