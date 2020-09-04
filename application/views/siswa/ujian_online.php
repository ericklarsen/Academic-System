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
                          <th>Mata Pelajaran</th>
                          <th>Catatan</th>
                          <th>Keterangan</th>
                          <th>Action</th>
                        </tr>
                        <?php $kelas = $this->Staff_model->ambil_data_id($_SESSION['nis'],'nis','user_murid');
                        $soal = $this->Staff_model->ambil_data_id_array_2($kelas->id_kelas,'id_kelas','on','status','soal');
                        foreach ($soal as $data) {
                        ?>
                        <tr>
                          <td>
                          <?php 
                          $pelajaran = $this->Staff_model->ambil_data_id($data['id_pelajaran'],'id_pelajaran','pelajaran'); 
                          echo $pelajaran->nama; 
                          ?>
                          </td>
                          <td class="align-middle">
                            <?php echo $data['catatan']; ?>
                          </td>
                          <td>
                            <?php 
                            $cek = $this->Staff_model->ambil_data_id_2($_SESSION['nis'],'nis',$data['id_soal'],'id_soal','nilai_ujian');
                            if ($cek) {
                              ?>
                              <div class="badge badge-success">Dikerjakan</div>
                              <?php
                            }else{
                              ?>
                              <div class="badge badge-danger">Belum dikerjakan</div>
                              <?php
                            }
                            ?>
                          </td>
                          <td>
                            <?php if (!$cek) {
                            ?>
                            <a href="<?php echo base_url().'siswa/ujian_online_mulai/'.$data['id_soal']; ?>" class="btn btn-warning">Laksanakan Ujian</a>
                            <?php
                            } ?>
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