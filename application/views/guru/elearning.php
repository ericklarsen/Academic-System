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
        <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
        <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
      </div>
    </div>

    <h2 class="section-title">Daftar Tingkat</h2>
    <p class="section-lead">
      Berikut adalah daftar tingkatan kelas untuk E-learning English.
    </p>

    <a href="<?php echo base_url(); ?>guru/buat_elearning" class="btn btn-primary mr-1" type="submit">Buat E-Learning</a>
    <br>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel List E-Learning yang telah dibuat</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Tingkat</th>
                  <th>Topik</th>
                  <th>Deskripsi</th>
                  <th>Action</th>
                </tr>
                <?php
                $lists = $this->Staff_model->ambil_data_semua('elearning');
                foreach ($lists as $data) {
                ?>
                  <tr>
                    <td><?php echo $data['tingkat']; ?></td>
                    <td><?php echo $data['topik']; ?></td>
                    <td><?php echo $data['deskripsi']; ?></td>
                    <td>
                      <?php
                      $cekSoal = $this->Staff_model->ambil_data_id($data['id_elearning'], 'id_elearning', 'soal_ujian');
                      if (!$cekSoal) {
                      ?>
                        <a href="<?php echo base_url() . 'guru/tambah_soal_ujian/' . $data['id_elearning']; ?>" class="btn btn-primary">Buat Soal Test</a>
                      <?php
                      } ?>

                      <?php
                      $cekMateri = $this->Staff_model->ambil_data_id($data['id_elearning'], 'id_elearning', 'materi');
                      if (!$cekMateri) {
                      ?>
                        <a href="<?php echo base_url() . 'guru/tambah_soal_ujian/' . $data['id_elearning']; ?>" class="btn btn-primary">Upload Materi</a>
                      <?php
                      } ?>
                      <a href="<?php echo base_url() . 'guru/soal_ujian_online_nilai/' . $data['id_elearning'].'/' . $data['tingkat'].'/' . $data['topik']; ?>" class="btn btn-info">Lihat Nilai</a>
                      <a href="<?php echo base_url() . 'guru/daftar_soal_ujian/' . $data['id_elearning']; ?>" class="btn btn-info">Lihat Soal</a>
                      <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url() . 'guru/hapus_soal_ujian_online/' . $data['id_elearning']; ?>';">Hapus</a>
                      <?php if ($data['status'] == 'off') { ?>
                        <a href="<?php echo base_url() . 'guru/soal_on/' . $data['id_elearning']; ?>" class="btn btn-success">On</a>
                      <?php } else {
                      ?>
                        <a href="<?php echo base_url() . 'guru/soal_off/' . $data['id_elearning']; ?>" class="btn btn-danger">Off</a>
                      <?php
                      } ?>
                    </td>
                  </tr>
                  <?php
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