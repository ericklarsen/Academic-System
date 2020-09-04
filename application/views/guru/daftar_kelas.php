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
              <?php 
              $cek1 = $this->Staff_model->ambil_data_id_array($_SESSION['nip'],'nip','pelajaran');
               foreach ($cek1 as $data) {
               ?>
               <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Pelajaran <?php echo $data['nama']; ?></h4>

                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Kelas</th>
                          <th>Jumlah Murid</th>
                          <th>Wali Kelas</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        $cek2 = $this->Staff_model->ambil_data_id_array($data['id_pelajaran'],'id_pelajaran','kurikulum');
                        foreach ($cek2 as $data) {
                        ?>
                          <tr>
                          <td>
                            <b>
                              <?php 
                              $nama_kelas = $this->Staff_model->ambil_data_id($data['id_kelas'],'id_kelas','kelas');
                              echo $nama_kelas->tingkat.' '.strtoupper($nama_kelas->jurusan).' '.strtoupper($nama_kelas->kelas);
                              ?>
                            </b>
                          </td>
                          <td class="align-middle">
                            <?php 
                              $jumlah_murid = $this->Staff_model->ambil_data_id_array($data['id_kelas'],'id_kelas','user_murid');
                              echo count($jumlah_murid).' murid';
                              ?>
                          </td>
                          <td>
                            <div class="badge badge-info">
                            <?php 
                              $wali = $this->Staff_model->ambil_data_id($nama_kelas->nip,'nip','user_staff');
                              echo $wali->nama;
                              ?>
                          </div>
                        </td>
                          <td>
                            <a href="<?php echo base_url().'guru/murid/'.$data['id_kelas'].'/'.$data['id_pelajaran']; ?>" class="btn btn-info">Lihat Nilai</a>
                            <a href="<?php echo base_url().'guru/absensi_list/'.$data['id_kelas'].'/'.$data['id_pelajaran'];?>" class="btn btn-warning">Isi Absensi</a>
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
               <?php
               }
               ?>

            </div>

              


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>