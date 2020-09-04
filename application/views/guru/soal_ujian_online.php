<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $title;?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <h2 class="section-title">Daftar Kelas</h2>
            <p class="section-lead">
              Berikut adalah daftar soal ujian online dari mata pelajaran yang diampuh.
            </p>

                    <a href="<?php echo base_url(); ?>guru/tambah_soal_ujian_online" class="btn btn-primary mr-1" type="submit">Tambah Soal Baru</a>
<br>
<br>                    
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Daftar Soal</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Untuk Kelas</th>
                          <th>Pelajaran</th>
                          <th>Catatan</th>
                          <th>Action</th>
                        </tr>
                        <?php 

                        $lists = $this->Staff_model->ambil_data_id_array($_SESSION['nip'],'nip','pelajaran');
                        foreach ($lists as $data) {
                        $ceks = $this->Staff_model->ambil_data_id_array($data['id_pelajaran'],'id_pelajaran','soal');
                        if ($ceks) {
                          foreach ($ceks as $data2) {
                          $nama = $this->Staff_model->ambil_data_id($data2['id_kelas'],'id_kelas','kelas');
                          ?>

                        <tr>
                          <td><?php echo $nama->tingkat.' '.strtoupper($nama->jurusan).' '.strtoupper($nama->kelas) ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data2['catatan']; ?></td>
                          <td>
                            <?php $cek = $this->Staff_model->ambil_data_id($data2['id_soal'],'id_soal','soal_ujian');
                            if (!$cek) {
                               ?>

                            <a href="<?php echo base_url().'guru/tambah_soal_ujian/'.$data2['id_soal']; ?>" class="btn btn-warning">Input Soal</a>
                               <?php
                             } ?>
                            <a href="<?php echo base_url().'guru/soal_ujian_online_nilai/'.$data2['id_soal'].'/'.$data2['id_kelas']; ?>" class="btn btn-info">Lihat Nilai</a>
                            <a href="<?php echo base_url().'guru/daftar_soal_ujian/'.$data2['id_soal']; ?>" class="btn btn-info">Lihat Soal</a>
                            <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'guru/hapus_soal_ujian_online/'.$data2['id_soal']; ?>';">Hapus</a>
                            <?php if ($data2['status'] == 'off'){ ?>
                              <a href="<?php echo base_url().'guru/soal_on/'.$data2['id_soal']; ?>" class="btn btn-success">On</a>
                            <?php } else {
                              ?>
                              <a href="<?php echo base_url().'guru/soal_off/'.$data2['id_soal']; ?>" class="btn btn-danger">Off</a>
                              <?php
                            } ?>
                          </td>
                        </tr> 
                          <?php
                        }
                      }
                        ?>
                        <?php
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