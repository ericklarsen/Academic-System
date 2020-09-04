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
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Data</h4>
                     
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <th>Keterangan</th>
                          <?php 
                          if ($_SESSION['jabatan'] != 'kepsek') {
                          ?>
                          <th>Action</th>
                         
                          <?php
                           } ?>
                        </tr>
                        <?php foreach ($lists as $data) {
                        ?>
                        <tr>
                          <td>
                          <?php $murid = $this->Staff_model->ambil_data_id($data['nis'],'nis','user_murid'); echo $murid->nama;?>
                          </td>
                          <td class="align-middle">
                            <?php echo $data['keterangan']; ?>
                          </td>
                          <?php 
                          if ($_SESSION['jabatan'] != 'kepsek') {
                          ?>
                          <td>
                            <a href="<?php echo base_url().'guru/absensi_list_detail_edit/'.$data['id_absensi'].'/'.$id_kelas.'/'.$data['id_pelajaran']; ?>" class="btn btn-warning">Edit</a>
                          </td>
                          <?php
                           } ?>
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