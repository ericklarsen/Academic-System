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
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Daftar Prestasi</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Prestasi</th>
                        </tr>
                        <?php $prestasi = $this->Staff_model->ambil_data_id_array($_SESSION['nis'],'nis','prestasi');
                        if ($prestasi) {
                        foreach ($prestasi as $data) {
                        ?>
                        <tr>
                          <td><?php echo $data['isi'] ?></td>
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