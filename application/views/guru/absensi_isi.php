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
                <form method="post" action="<?php echo base_url().'guru/aksi_isi_absensi' ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Tanggal Pertemuan</label>
                      <input type="date" class="form-control" name="tanggal">
                    </div>
                    <?php 
                        $cek = $this->Staff_model->ambil_data_semua_4($id_pelajaran,'pertemuan','id_pelajaran',$id_kelas,'id_kelas','absensi');
                        // print_r($cek[0]['pertemuan']);
                     ?>
                    <div class="form-group">
                      <label>Pertemuan Ke</label>
                      <select name="pertemuan" class="form-control">
                        <?php 
                        for ($i=1; $i <= 45  ; $i++) { 
                          if ($cek) {
                          if ($cek[$i-1]['pertemuan'] != $i){
                          ?>
                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                          <?php
                          }
                          }else{
                            ?>
                        <option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
                            <?php
                          }
                      } ?>
                      </select>
                    </div>

                    <h6>Daftar Murid</h6>
                    <?php
                    $murid = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','user_murid');
                    foreach ($murid as $data) {
                    ?>
                    <div class="form-group">
                      <label>- <?php echo $data['nama']; ?></label>
                      <input type="hidden" name="nis[]" value="<?php echo $data['nis']; ?>">
                      <input type="hidden" name="id_pelajaran" value="<?php echo $id_pelajaran; ?>">
                      <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>">
                      <input type="hidden" name="semester" value="<?php 
                      $cek = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas'); echo $cek->semester; ?>">
                      <select name="keterangan[]" class="form-control">
                        <option value="hadir">Hadir</option>
                        <option value="sakit">Sakit</option>
                        <option value="izin">Izin</option>
                        <option value="alpha">Alpha</option>
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
                    <h4>Note</h4>
                  </div>
                  <div class="card-body">
                    <?php if ($this->session->flashdata('error')) {
                  ?>
                  <div class="alert alert-warning alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        <b>Error!</b> <?php echo $this->session->flashdata('error'); ?>
                      </div>
                    </div>
                  <?php
                  } ?>
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