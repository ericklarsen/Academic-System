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
                          <th>Kelas</th>
                          <th>Wali</th>
                          <th>Action</th>
                        </tr>
                          <?php 
                          $kelas = $this->Staff_model->ambil_data_semua('kelas');
                          foreach ($kelas as $data) {
                            ?>
                        <tr>
                            <td>
                              <b>
                              <?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas'])  ?>
                              </b>
                              </td>
                              <td>
                                <div class="badge badge-info">
                                <?php $guru = $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff');
                                echo $guru->nama; ?>
                              </div>
                              </td>
                              <td>
                            <a href="<?php echo base_url().'kepsek/rekap_nilai/'.$data['id_kelas']; ?>" class="btn btn-warning">Lihat Nilai</a>
                          </td>
                        </tr>
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