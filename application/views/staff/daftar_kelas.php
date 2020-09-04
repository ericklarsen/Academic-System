<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Daftar Kelas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Kesiswaan</a></div>
              <div class="breadcrumb-item"><a href="#">Daftar kelas</a></div>
            </div>
          </div>

          <div class="section-body">
            <a href="<?php echo base_url(); ?>staff/tambah_kelas" class="btn btn-lg btn-primary">Tambah Kelas Baru</a>
            <br>
            <br>
          </div>  
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Data Kelas</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Kelas</th>
                          <th>Semester</th>
                          <th>Wali Kelas</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($lists as $data) {
                          ?>
                          <tr>
                          <td>
                           <b><?php echo $data['tingkat']." ".strtoupper($data['jurusan'])." ".$data['kelas']; ?></b>
                          </td>
                          <td><?php echo $data['semester']; ?></td>
                          <td><div class="badge badge-info">
                            <?php $data2= $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); echo $data2->nama; ?>
                          </div></td>
                          <td>
                            <a href="<?php echo base_url().'staff/kelas_detail/'.$data['id_kelas']; ?>" class="btn btn-info">Detail Kelas</a>
                            <a href="<?php echo base_url().'staff/kelas_absensi/'.$data['id_kelas']; ?>" class="btn btn-info">Absensi</a>
                            <a href="<?php echo base_url().'staff/kelas_edit/'.$data['id_kelas']; ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'staff/kelas_delete/'.$data['id_kelas']; ?>';"> Delete</a>
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