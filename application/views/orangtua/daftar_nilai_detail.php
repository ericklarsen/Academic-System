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
              <div class="breadcrumb-item active"><a href="#">Kesiswaan</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <?php 
          $pelajaran = $this->Staff_model->ambil_data_id($lists->id_pelajaran,'id_pelajaran','pelajaran');
          $nama = $this->Staff_model->ambil_data_id($lists->nis,'nis','user_murid');
           ?>

          <h2 class="section-title"><?php echo 'Nilai '.$pelajaran->nama; ?></h2>
          <p class="section-lead">
            <?php echo $nama->nama; ?>
              </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Nilai Pengetahuan</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
              <tr>
                <th>UH</th>
                <th>Lisan</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th><i><b>Nilai Akhir</b></i></th>
                <th><i><b>Predikat</b></i></th>
              </tr>
                <tr>
                  <td>
                    <?php echo $lists->uh; ?>
                  </td>
                  <td>
                    <?php echo $lists->lisan;  ?>
                  </td>
                  <td>
                    <?php echo $lists->tugas;  ?>
                  </td>
                  <td>
                    <?php echo $lists->uts;  ?>
                  </td>
                  <td>
                    <?php echo $lists->uas;  ?>
                  </td>
                  <td>
                    <?php echo $lists->nilai_akhir;  ?>
                  </td>
                  <td>
                    <?php echo $lists->predikat;  ?>
                  </td>
                </tr>
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