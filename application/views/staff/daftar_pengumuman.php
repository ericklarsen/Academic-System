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
              <div class="breadcrumb-item"></div>
            </div>
          </div>

          <div class="section-body">
            <a href="<?php echo base_url(); ?>staff/tambah_pengumuman" class="btn btn-lg btn-primary">Tambah Pengumuman Baru</a>
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
                          <th>Judul</th>
                          <th>Isi</th>
                          <th>Action</th>
                        </tr>
                        <?php foreach ($lists as $data) {
                         ?>
                         <tr>
                          <td><div class="badge badge-info"><?php echo $data['judul']; ?></div></td>
                          <td><?php echo $data['isi']; ?></td>
                          <td>
                            <a href="<?php echo base_url().'staff/pengumuman_edit/'.$data['id_pengumuman']; ?>" class="btn btn-warning">Edit</a>
                            <a href="<?php echo base_url().'staff/pengumuman_delete/'.$data['id_pengumuman']; ?>" class="btn btn-danger">Delete</a>
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