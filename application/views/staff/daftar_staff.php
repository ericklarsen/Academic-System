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
              <div class="breadcrumb-item active"><a href="#">Kepegawaian</a></div>
              <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
            </div>
          </div>

          <div class="section-body">
            <a href="<?php echo base_url(); ?>staff/tambah_staff" class="btn btn-lg btn-primary">Tambah Staff Baru</a>
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
                          <th>NIP</th>
                          <!-- <th>Password Akun</th> -->
                          <th>Nama Lengkap</th>
                          <th>Telp</th>
                          <th>Jabatan</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($lists as $data) {
                          ?>
                          <tr>
                          <td>
                          <a href="" class="btn btn-outline-primary"><?php echo $data['nip']; ?></a>
                          </td>
                          <!-- <td><?php echo $data['password']; ?></td> -->
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['telp']; ?></td>
                          <td><div class="badge badge-info"><?php echo $data['jabatan']; ?></div></td>
                          <td>
                            <a href="<?php echo base_url().'staff/staff_edit/'.$data['nip']; ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'staff/staff_delete/'.$data['nip']; ?>';">Delete</a>
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