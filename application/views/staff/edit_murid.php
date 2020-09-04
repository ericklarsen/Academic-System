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
                <form method="POST" action="<?php  echo base_url().'staff/aksi_murid_edit'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>NIS</label>
                      <input type="text" class="form-control" value="<?php echo $lists->nis;?>" disabled>
                      <input type="hidden" class="form-control" name="nis" value="<?php echo $lists->nis;?>">
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" value="<?php echo $lists->password;?>">
                    </div>

                    <div class="form-group">
                      <label>Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" value="<?php echo $lists->nama;?>">
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control" value="<?php echo $lists->alamat;?>">
                    </div>

                    <div class="form-group">
                      <label>Telp. Pribadi</label>
                      <input type="text" name="telp" class="form-control" value="<?php echo $lists->telp;?>">
                    </div>

                    <div class="form-group">
                      <label>Telp. Orang tua/Wali</label>
                      <input type="text" name="telp_ortu" class="form-control" value="<?php echo $lists->telp_ortu;?>">
                    </div>

                    <div class="form-group">
                      <label>Kelas</label>
                      <select class="form-control" name="id_kelas">
                        <?php $kelas = $this->Staff_model->ambil_data_semua('kelas');
                        foreach ($kelas as $data) {
                        ?>
                        <option value="<?php echo $data['id_kelas']; ?>" <?php if($data['id_kelas'] == $lists->id_kelas) echo 'selected';?>>
                          <?php echo $data['tingkat'].' '.strtoupper($data['jurusan'].' '.strtoupper($data['kelas'])); ?>
                        </option>
                        <?php
                         } ?>
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