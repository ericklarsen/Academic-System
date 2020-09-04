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
        <form  method="post" action="<?php echo base_url().'staff/aksi_jadwal_edit'; ?>">
          <div class="card">
            <div class="card-header">
              <h4>Form Data</h4>
            </div>
            <div class="card-body">
             <div class="form-group">
              <label>Kelas</label>
              <input type="text" class="form-control" name="kelas" value="<?php echo $lists->tingkat.' '.strtoupper($lists->jurusan).' '.strtoupper($lists->kelas);?>" disabled>
              <input type="hidden" class="form-control" name="id_kelas" value="<?php echo $lists->id_kelas;?>">
            </div>

            <?php foreach ($lists2 as $data) {
              ?>
              <input type="hidden" name="id_jadwal[]" value="<?php echo $data['id_jadwal']; ?>">
              <?php
            } ?>

            <label><b>Senin</b></label>
            <div class="form-group" id="insert-senin">
              <?php 
              $index = 1;
              $hari = 0;
              foreach ($lists2 as $data2) {
                if ($data2['hari'] == 'senin') {
                  $hari++;
                  ?>
                  <label>Pelajaran ke- <?php echo $index; $index++; ?></label>
                  <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                  <select name="senin[]" class="form-control">
                    <?php foreach ($pelajaran as $data) {?>
                      <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                      <option value="<?php echo $data['id_pelajaran']; ?>" <?php if($data['id_pelajaran'] == $data2['id_pelajaran']) echo 'selected'; ?>>
                        <?php echo $data['nama'].' - '.$guru->nama; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <br>
                  <label>Jam</label>
                  <input type="text" name="jam1[]" class="form-control" value="<?php echo $data2['jam']; ?>">
                  <br>
                  <?php
                }
              } ?>
                    <input type="hidden" id="jumlah-senin" value="<?php echo $hari; ?>">
            </div>

            <button type="button" id="btn-tambah-senin" class="btn btn-warning mr-1">Tambah Pelajaran</button>

            <br>
            <br>
            <br>
            <label><b>Selasa</b></label>
            <div class="form-group" id="insert-selasa">
              <?php 
              $index = 1;
              $hari = 0;
              foreach ($lists2 as $data2) {
                if ($data2['hari'] == 'selasa') {
                  $hari++;
                  ?>
                  <label>Pelajaran ke- <?php echo $index; $index++; ?></label>
                  <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                  <select name="selasa[]" class="form-control">
                    <?php foreach ($pelajaran as $data) {?>
                      <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                      <option value="<?php echo $data['id_pelajaran']; ?>" <?php if($data['id_pelajaran'] == $data2['id_pelajaran']) echo 'selected'; ?>>
                        <?php echo $data['nama'].' - '.$guru->nama; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <br>
                  <label>Jam</label>
                  <input type="text" name="jam2[]" class="form-control" value="<?php echo $data2['jam']; ?>">
                  <br>
                  <?php
                }
              } ?>
                    <input type="hidden" id="jumlah-selasa" value="<?php echo $hari; ?>">
            </div>

            <button type="button" id="btn-tambah-selasa" class="btn btn-warning mr-1">Tambah Pelajaran</button>

            <br>
            <br>
            <br>
            <label><b>Rabu</b></label>
            <div class="form-group" id="insert-rabu">
              <?php 
              $index = 1;
              $hari = 0;
              foreach ($lists2 as $data2) {
                if ($data2['hari'] == 'rabu') {
                  $hari++;
                  ?>
                  <label>Pelajaran ke- <?php echo $index; $index++; ?></label>
                  <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                  <select name="rabu[]" class="form-control">
                    <?php foreach ($pelajaran as $data) {?>
                      <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                      <option value="<?php echo $data['id_pelajaran']; ?>" <?php if($data['id_pelajaran'] == $data2['id_pelajaran']) echo 'selected'; ?>>
                        <?php echo $data['nama'].' - '.$guru->nama; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <br>
                  <label>Jam</label>
                  <input type="text" name="jam3[]" class="form-control" value="<?php echo $data2['jam']; ?>">
                  <br>
                  <?php
                }
              } ?>
                    <input type="hidden" id="jumlah-rabu" value="<?php echo $hari; ?>">
            </div>

            <button type="button" id="btn-tambah-rabu" class="btn btn-warning mr-1">Tambah Pelajaran</button>

            <br>
            <br>
            <br>
            <label><b>Kamis</b></label>
            <div class="form-group" id="insert-kamis">
              <?php 
              $index = 1;
              $hari = 0;
              foreach ($lists2 as $data2) {
                if ($data2['hari'] == 'kamis') {
                  $hari++;
                  ?>
                  <label>Pelajaran ke- <?php echo $index; $index++; ?></label>
                  <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                  <select name="kamis[]" class="form-control">
                    <?php foreach ($pelajaran as $data) {?>
                      <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                      <option value="<?php echo $data['id_pelajaran']; ?>" <?php if($data['id_pelajaran'] == $data2['id_pelajaran']) echo 'selected'; ?>>
                        <?php echo $data['nama'].' - '.$guru->nama; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <br>
                  <label>Jam</label>
                  <input type="text" name="jam4[]" class="form-control" value="<?php echo $data2['jam']; ?>">
                  <br>
                  <?php
                }
              } ?>
                    <input type="hidden" id="jumlah-kamis" value="<?php echo $hari; ?>">
            </div>

            <button type="button" id="btn-tambah-kamis" class="btn btn-warning mr-1">Tambah Pelajaran</button>

            <br>
            <br>
            <br>
            <label><b>Jum'at</b></label>
            <div class="form-group" id="insert-jumat">
              <?php 
              $index = 1;
              $hari = 0;
              foreach ($lists2 as $data2) {
                if ($data2['hari'] == 'jumat') {
                  $hari++;
                  ?>
                  <label>Pelajaran ke- <?php echo $index; $index++; ?></label>
                  <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?>
                  <select name="jumat[]" class="form-control">
                    <?php foreach ($pelajaran as $data) {?>
                      <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); ?>
                      <option value="<?php echo $data['id_pelajaran']; ?>" <?php if($data['id_pelajaran'] == $data2['id_pelajaran']) echo 'selected'; ?>>
                        <?php echo $data['nama'].' - '.$guru->nama; ?>
                      </option>
                    <?php } ?>
                  </select>
                  <br>
                  <label>Jam</label>
                  <input type="text" name="jam5[]" class="form-control" value="<?php echo $data2['jam']; ?>">
                  <br>
                  <?php
                }
              } ?>
                    <input type="hidden" id="jumlah-jumat" value="<?php echo $hari; ?>">
            </div>

            <button type="button" id="btn-tambah-jumat" class="btn btn-warning mr-1">Tambah Pelajaran</button>

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