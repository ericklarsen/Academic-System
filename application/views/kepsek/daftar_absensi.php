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
              <div class="breadcrumb-item active"><a href="#"></a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>
          <?php 
          $kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
           ?>
           <h2 class="section-title">Kelas <?php echo $kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);?></h2>
            <p class="section-lead">
              Berikut adalah daftar absensi dari seluruh murid untuk semua mata pelajaran.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Data</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Mata Pelajaran</th>
                          <th>Pengajar</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        $pelajaran = $this->Staff_model->ambil_data_id_array($kelas->id_kelas,'id_kelas','kurikulum');
                        foreach ($pelajaran as $data) {
                          $nama_pelajaran = $this->Staff_model->ambil_data_id($data['id_pelajaran'],'id_pelajaran','pelajaran');
                          $guru = $this->Staff_model->ambil_data_id($nama_pelajaran->nip,'nip','user_staff');
                        ?>

                        <tr>
                          <td>
                            <a href="#" class="btn btn-outline-primary"><?php echo $nama_pelajaran->nama; ?></a>
                          </td>
                          <td><div class="badge badge-info"><?php echo $guru->nama; ?></div></td>
                          <td>
                            <a href="<?php echo base_url().'kepsek/rekap_absensi_detail/'.$data['id_pelajaran'].'/'.$kelas->id_kelas; ?>" class="btn btn-info">Lihat Absensi</a>
                          </td>
                        </tr>

                        <?php
                        }
                         ?>
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