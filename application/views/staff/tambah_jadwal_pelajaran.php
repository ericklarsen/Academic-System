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
                <form  method="post" action="<?php echo base_url().'staff/aksi_tambah_jadwal'; ?>">
                <div class="card">
                  <div class="card-header">
                    <h4>Form Data</h4>
                  </div>
                  <div class="card-body">
                     <div class="form-group">
                      <label>Tingkat Kelas</label>
                      <select name="id_kelas" class="form-control">
                       <?php $kelas = $this->Staff_model->ambil_data_semua('kelas'); ?>
                       <?php foreach ($kelas as $data) {
                        $cek = $this->Staff_model->ambil_data_id($data['id_kelas'],'id_kelas','jadwal');
                        if ($cek == null) {
                        ?>
                       <option value="<?php echo $data['id_kelas']; ?>"><?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?></option>
                        <?php
                        }
                       } ?>
                      </select>
                    </div>

                    <label><b>Senin</b></label>
                    <div class="form-group" id="insert-senin">
                      <label>Pelajaran ke- 1</label>
                      <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                      <select name="senin[]" class="form-control">
                        <?php foreach ($pelajaran as $data) {?>
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                          <option value="<?php echo $data['id_pelajaran']; ?>">
                            <?php echo $data['nama'].' - '.$guru->nama; ?>
                          </option>
                          <?php } ?>
                      </select>
                      <br>
                      <label>Jam</label>
                      <input type="text" name="jam1[]" class="form-control" value="">
                      <br>
                    <input type="hidden" id="jumlah-senin" value="1">

                    </div>

                      <button type="button" id="btn-tambah-senin" class="btn btn-primary mr-1">Tambah Pelajaran</button>

                    <br>
                    <br>
                    <br>
                    <label><b>Selasa</b></label>
                    <div class="form-group" id="insert-selasa">
                      <label>Pelajaran ke- 1</label>
                      <select name="selasa[]" class="form-control">
                        <?php foreach ($pelajaran as $data) {
                          ?>
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                          <option value="<?php echo $data['id_pelajaran']; ?>">
                            <?php echo $data['nama'].' - '.$guru->nama; ?>
                          </option>
                          <?php
                        } ?>
                      </select>
                      <br>
                      <label>Jam</label>
                      <input type="text" name="jam2[]" class="form-control" value="">
                      <br>
                    <input type="hidden" id="jumlah-selasa" value="1">
                    </div>

                      <button type="button" id="btn-tambah-selasa" class="btn btn-primary mr-1">Tambah Pelajaran</button>
                    <br>
                    <br>
                    <br>
                    <label><b>Rabu</b></label>
                    <div class="form-group"id="insert-rabu">
                      <label>Pelajaran ke- 1</label>
                      <select name="rabu[]" class="form-control">
                        <?php foreach ($pelajaran as $data) {
                          ?>
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                          <option value="<?php echo $data['id_pelajaran']; ?>">
                            <?php echo $data['nama'].' - '.$guru->nama; ?>
                          </option>
                          <?php
                        } ?>
                      </select>
                      <br>
                      <label>Jam</label>
                      <input type="text" name="jam3[]" class="form-control" value="">
                      <br>
                    <input type="hidden" id="jumlah-rabu" value="1">
                    </div>
                      <button type="button" id="btn-tambah-rabu" class="btn btn-primary mr-1">Tambah Pelajaran</button>

                    <br>
                    <br>
                    <br>
                    <label><b>Kamis</b></label>
                    <div class="form-group" id="insert-kamis">
                      <label>Pelajaran ke- 1</label>
                      <select name="kamis[]" class="form-control">
                        <?php foreach ($pelajaran as $data) {
                          ?>
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                          <option value="<?php echo $data['id_pelajaran']; ?>">
                            <?php echo $data['nama'].' - '.$guru->nama; ?>
                          </option>
                          <?php
                        } ?>
                      </select>
                      <br>
                      <label>Jam</label>
                      <input type="text" name="jam4[]" class="form-control" value="">
                      <br>
                    <input type="hidden" id="jumlah-kamis" value="1">
                    </div>
                      <button type="button" id="btn-tambah-kamis" class="btn btn-primary mr-1">Tambah Pelajaran</button>

                    <br>
                    <br>
                    <br>
                    <label><b>Jum'at</b></label>
                    <div class="form-group" id="insert-jumat">
                      <label>Pelajaran ke- 1</label>
                      <select name="jumat[]" class="form-control">
                        <?php foreach ($pelajaran as $data) {
                          ?>
                          <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                          <option value="<?php echo $data['id_pelajaran']; ?>">
                            <?php echo $data['nama'].' - '.$guru->nama; ?>
                          </option>
                          <?php
                        } ?>
                      </select>
                      <br>
                      <label>Jam</label>
                      <input type="text" name="jam5[]" class="form-control" value="">
                      <br>
                    <input type="hidden" id="jumlah-jumat" value="1">
                    </div>
                      <button type="button" id="btn-tambah-jumat" class="btn btn-primary mr-1">Tambah Pelajaran</button>

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