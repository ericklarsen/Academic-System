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
              <div class="breadcrumb-item active"><a href="#">Wali Kelas</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <h2 class="section-title"><?php echo $title2; ?></h2>
          <p class="section-lead">
              <?php echo $title3; ?>
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
                          <th>Hari & Tanggal</th>
                          <th>Pertemuan ke</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        // print_r($lists);
                        $temp = '';
                        foreach ($lists as $data) {
                          $cek = $this->Staff_model->ambil_data_id($data['nis'],'nis','user_murid');
                          if ($cek->id_kelas == $id_kelas) {
                            if ($data['tanggal'] != $temp) {
                              ?>
                        <tr>
                          <td>
                          <?php 
                          echo date("l, d F Y",strtotime($data['tanggal']));
                          // echo date_format($data['tanggal'], "l, d F Y");
                          ?>
                          </td>
                          <td class="align-middle">
                            <?php echo $data['pertemuan']; ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url().'guru/rekap_absensi_detail2/'.$data['tanggal'].'/'.$data['id_pelajaran'].'/'.$data['pertemuan'].'/'.$id_kelas; ?>" class="btn btn-info">Lihat Detail</a>
                          </td>
                        </tr>
                              <?php
                            }
                            ?>
                            <?php
                          }
                            $temp = $data['tanggal'];
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