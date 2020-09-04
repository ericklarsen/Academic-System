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
              <div class="breadcrumb-item"><a href=""><?php echo $title; ?></a></div>
            </div>
          </div>

          <div class="section-body">
            <a href="<?php echo base_url() ?>staff/tambah_murid" class="btn btn-lg btn-primary">Tambah Murid Baru</a>
            <br>
            <br>
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
                          <th>NIS</th>
                          <th>Nama Lengkap</th>
                          <th>Kelas</th>
                          <th>Alamat</th>
                          <th>Telp Pribadi</th>
                          <th>Telp Orang tua/Wali</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($lists as $data) {
                         ?>

                        <tr>
                          <td>
                         <b><?php echo $data['nis']; ?></b>
                          </td>
                          <td><?php echo $data['nama']; ?></td>
                          <td>
                            <?php 
                            $kelas = $this->Staff_model->ambil_data_id($data['id_kelas'],'id_kelas','kelas');
                            if($kelas){
                            echo $kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas);
                            }
                             ?>
                          </td>
                          <td><?php echo $data['alamat']; ?></td>
                          <td><?php echo $data['telp']; ?></td>
                          <td><?php echo $data['telp_ortu']; ?></td>
                          <td>
                            <?php if($data['status'] == 'on'){
                              ?>
                              <div class="badge badge-success"><?php echo $data['status']; ?></div>
                              <?php
                            }else{
                              ?>
                              <div class="badge badge-secondary"><?php echo $data['status']; ?></div>
                              <?php
                            } ?>
                          </td>
                          <td>
                            <a href="<?php echo base_url().'staff/murid_edit/'.$data['nis']; ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'staff/murid_delete/'.$data['nis']; ?>';">Delete</a>
                            <?php if($data['status'] == 'on'){
                              ?>
                            <a href="<?php echo base_url().'staff/murid_off/'.$data['nis']; ?>" class="btn btn-primary"><i>Off</i></a>
                              <?php
                            }else{
                              ?>
                            <a href="<?php echo base_url().'staff/murid_on/'.$data['nis']; ?>" class="btn btn-primary"><i>On</i></a>
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