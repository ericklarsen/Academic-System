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
              <div class="breadcrumb-item active"><a href="#"></a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Nilai Murid</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <th><i><b>Nilai</b></i></th>
                        </tr>
                        <?php 
                        $murid = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','user_murid');
                        foreach ($murid as $data) {
                          $nilai = $this->Staff_model->ambil_data_id_2($data['nis'],'nis',$id_soal,'id_soal','nilai_ujian');
                        ?>

                        <tr>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php if($nilai) echo $nilai->nilai; ?></td>
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