  <?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('assets/header');
  ?>
  <!-- Main Content -->
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1><?php $kelas = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas'); echo 'Rekap Sanksi';?></h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
          <div class="breadcrumb-item"><a href="#">Rekap Sanksi</a></div>
        </div>
      </div>

      <h2 class="section-title">Kelas 
        <?php echo $kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas) ?>
      </h2>
      <p class="section-lead">
        Berikut adalah daftar sanksi yang dilakukan murid.
      </p>

      <div class="form-group col-12 col-md-6 col-lg-6">
        <a href="<?php echo base_url().'guru/tambah_sanksi/'.$kelas->id_kelas; ?>" class="btn btn-primary mr-1" type="submit">Tambah Sanksi Baru</a>

      </div>
      <?php if ($this->session->flashdata('success')) {
        ?>
        <div class="alert alert-warning alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
            <b>Success!</b> <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
        <?php
      }elseif ($this->session->flashdata('error')){
        ?>
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
            <b>Error!</b> <?php echo $this->session->flashdata('error'); ?>
          </div>
        </div>
        <?php
      } ?>

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
                    <th>Tindakan yang dilakukan</th>
                    <th>Penanganan/Sanksi yang diberikan</th>
                    <th>Action</th>
                  </tr>

                  <?php foreach ($lists as $data) {
                    $cek = $this->Staff_model->ambil_data_id($data['nis'],'nis','user_murid');
                    if ($cek->id_kelas == $kelas->id_kelas) {
                      ?>
                      <tr>
                        <td><?php echo $cek->nama; ?></td>
                        <td><?php $sanksi = $this->Staff_model->ambil_data_id($data['id_ksanksi'],'id_ksanksi','kategori_sanksi');
                        echo 'Level '.$sanksi->level.' - '.$sanksi->sublevel; ?></td>
                        <td><?php echo $data['penanganan']; ?></td>
                        <td>
                          <form method="post" action="<?php echo base_url().'guru/edit_sanksi'; ?>">
                            <input type="hidden" name="id_sanksi" value="<?php echo $data['id_sanksi']; ?>">
                            <button type="submit" class="btn btn-warning">Edit</button>
                          </form>
                          <br>
                          <form method="post" action="<?php echo base_url().'guru/aksi_sms_ortu'; ?>">
                            <input type="hidden" name="nama" value="<?php echo $cek->nama; ?>">
                            <input type="hidden" name="tindakan" value="<?php echo 'Level '.$sanksi->level.' - '.$sanksi->sublevel; ?>">
                            <input type="hidden" name="penanganan" value="<?php echo $data['penanganan']; ?>">
                            <input type="hidden" name="telp_ortu" value="<?php echo $cek->telp_ortu; ?>">
                            <button type="submit" class="btn btn-info">SMS ke Orang tua</button>

                          </form>
                          <br>
                          <form method="post" action="<?php echo base_url().'guru/hapus_sanksi'; ?>">
                            <input type="hidden" name="id_sanksi" value="<?php echo $data['id_sanksi']; ?>">
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