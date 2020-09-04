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
                <form method="post" action="<?php echo base_url().'/guru/aksi_absensi_list_detail_edit' ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" disabled value="<?php $murid = $this->Staff_model->ambil_data_id($lists->nis,'nis','user_murid'); echo $murid->nama; ?>" class="form-control">
                      <input type="hidden" value="<?php echo $lists->id_absensi; ?>" name="id_absensi" class="form-control">
                      <input type="hidden" value="<?php echo $lists->id_pelajaran; ?>" name="id_pelajaran" class="form-control">
                      <input type="hidden" value="<?php echo $id_kelas; ?>" name="id_kelas" class="form-control">
                    </div>

                    <div class="form-group">
                      <label>Tanggal Pertemuan</label>
                      <input type="date" class="form-control" name="tanggal" value="<?php echo $lists->tanggal; ?>">
                    </div>

                    <div class="form-group">
                      <label>Pertemuan Ke</label>
                      <select class="form-control" name="pertemuan">
                        <?php for ($i=1; $i <=45 ; $i++) { 
                        ?>
                        <option value="<?php echo $i ?>" <?php if($lists->pertemuan == $i) echo "selected"; ?>><?php echo $i; ?></option>
                        <?php
                        } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <select name="keterangan" class="form-control">
                        <option value="hadir" <?php if($lists->keterangan == 'hadir') echo "selected"; ?>>Hadir</option>
                        <option value="sakit" <?php if($lists->keterangan == 'sakit') echo "selected"; ?>>Sakit</option>
                        <option value="izin" <?php if($lists->keterangan == 'izin') echo "selected"; ?>>Izin</option>
                        <option value="alpha" <?php if($lists->keterangan == 'alpha') echo "selected"; ?>>Alpha</option>
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