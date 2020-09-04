  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('assets/header');
  ?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1><?php $kelas = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas'); echo 'Rekap Prestasi';?></h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
          <div class="breadcrumb-item"><a href="#">Rekap Prestasi</a></div>
        </div>
      </div>

      <h2 class="section-title">Kelas 
        <?php echo $kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas) ?>
      </h2>
      <p class="section-lead">
        Berikut adalah daftar prestasi yang dilakukan murid.
      </p>

      <div class="form-group col-12 col-md-6 col-lg-6">
        <a href="<?php echo base_url().'guru/tambah_prestasi/'.$kelas->id_kelas; ?>" class="btn btn-primary mr-1" type="submit">Tambah Prestasi Baru</a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Sanksi</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th>Nama Murid</th>
                    <th>Prestasi</th>
                    <th>Action</th>
                  </tr>

                  <?php foreach ($lists as $data) {
                    $cek = $this->Staff_model->ambil_data_id($data['nis'],'nis','user_murid');
                    if ($cek->id_kelas == $kelas->id_kelas) {
                      ?>
                      <tr>
                        <td><?php echo $cek->nama ?></td>
                        <td><?php echo $data['isi']; ?></td>
                        <td>
                          <form method="post" action="<?php echo base_url().'guru/edit_prestasi'; ?>">
                            <input type="hidden" name="id_prestasi" value="<?php echo $data['id_prestasi']; ?>">
                            <button type="submit" class="btn btn-warning">Edit</button>
                          </form>
                          <br>
                          <form method="post" action="<?php echo base_url().'guru/hapus_prestasi'; ?>">
                            <input type="hidden" name="id_prestasi" value="<?php echo $data['id_prestasi']; ?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                      </tr>
                      <?php
                    }
                  } ?>
                  
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
</div>
<?php $this->load->view('assets/footer'); ?>