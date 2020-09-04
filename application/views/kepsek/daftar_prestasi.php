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
                          <th>NIS</th>
                          <th>Prestasi</th>
                        </tr>
                        <?php 
                        $prestasi = $this->Staff_model->ambil_data_semua('prestasi');
                        foreach ($prestasi as $data) {
                    $murid = $this->Staff_model->ambil_data_id($data['nis'],'nis','user_murid');
                        ?>
                        <tr>
                          <td>
                            <div class="badge badge-info">
                          <?php echo $data['nis'].' - '.$murid->nama; ?>
                        </div>
                          </td>
                          <td><?php echo $data['isi'] ?></td>
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