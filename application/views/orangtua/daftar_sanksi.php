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
                          <th>Tindakan</th>
                          <th>Penanganan</th>
                        </tr>
                        <?php $sanksi = $this->Staff_model->ambil_data_id_array($_SESSION['nis'],'nis','sanksi');
                        if ($sanksi) {
                        foreach ($sanksi as $data) {
                        ?>
                        <tr>
                          <td><?php $tindakan = $this->Staff_model->ambil_data_id($data['id_ksanksi'],'id_ksanksi','kategori_sanksi');
                          echo $tindakan->level.' - '.$tindakan->sublevel; ?></td>
                          <td><?php echo $data['penanganan']; ?></td>
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