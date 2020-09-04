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
              <div class="breadcrumb-item active"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <div class="section-body">
            <a href="<?php echo base_url(); ?>staff/tambah_kurikulum" class="btn btn-lg btn-primary">Tambah Kurikulum Pelajaran Baru</a>
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
                          <th>Kelas</th>
                          <th>List Pelajaran</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($lists as $data) {
                        ?>
                        <tr>
                          <td><?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?></td>
                          <td>
                            <?php $kurikulum = $this->Staff_model->ambil_data_id_array($data['id_kelas'],'id_kelas','kurikulum'); ?>
                            <?php foreach ($kurikulum as $data2) {
                            ?>
                            <b> 
                            <?php 
                            $nama_pelajaran = $this->Staff_model->ambil_data_id($data2['id_pelajaran'],'id_pelajaran','pelajaran'); 
                            echo $nama_pelajaran->nama;
                            ?>
                            </b>
                            ,
                            <?php 
                            $nama_guru = $this->Staff_model->ambil_data_id($nama_pelajaran->nip,'nip','user_staff');
                            echo $nama_guru->nama;
                            ?>
                            
                            <br>
                            <?php
                            } ?>
                          </td>
                          <td>
                            <?php 
                            $cek = $this->Staff_model->ambil_data_id_array($data['id_kelas'],'id_kelas','kurikulum');
                            if ($cek) {
                            ?>
                            <a href="<?php echo base_url().'/staff/kurikulum_edit/'.$data['id_kelas'] ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'/staff/kurikulum_delete/'.$data['id_kelas'] ?>';" class="btn btn-danger">Delete</a>
                            <?php
                            }
                             ?>
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