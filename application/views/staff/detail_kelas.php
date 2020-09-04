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

           <h2 class="section-title">Kelas <?php echo $lists->tingkat.' '.strtoupper($lists->jurusan).' '.strtoupper($lists->kelas); ?></h2>
            <p class="section-lead">
              Wali Kelas : 
              <?php 
              $nama_guru = $this->Staff_model->ambil_data_id($lists->nip,'nip','user_staff');
              echo $nama_guru->nama; ?>
              <br>
              Total Murid : 
              <?php 
              $total_murid = $this->Staff_model->ambil_data_id_array($lists->id_kelas,'id_kelas','user_murid');
              echo count($total_murid);
              ?>
              <br>Semester <?php echo $lists->semester;?>
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
                          <th>NIS</th>
                          <th>Nama</th>
                        </tr>
                        <?php foreach ($lists2 as $data) {
                         ?>

                        <tr>
                          <td>
                            <?php echo $data['nis']; ?>
                          </td>
                          <td>
                            <?php echo $data['nama']; ?>
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