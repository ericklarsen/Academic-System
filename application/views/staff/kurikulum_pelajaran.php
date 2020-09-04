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
      <a href="<?php echo base_url() ?>staff/tambah_pelajaran" class="btn btn-lg btn-primary">Tambah Pelajaran Baru</a>
      <br>
      <br>
    </div>  
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Data</h4>
            <div class="card-header-form">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <!-- <th>ID</th> -->
                  <th>Nama</th>
                  <th>Nilai KKM</th>
                  <th>Pengajar</th>
                  <th>Action</th>
                </tr>
                <?php foreach ($lists as $data) {
                  ?>
                  <tr>
                    <!-- <td>
                      <b><?php echo $data['id_pelajaran']; ?></b>
                    </td> -->
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nilai_kkm']; ?></td>
                    <td>
                      <div class="badge badge-info">
                        <?php $data2= $this->Staff_model->ambil_data_id($data['nip'],'nip','user_staff'); echo $data2->nama; ?>
                      </div>
                    </td>
                    <td>
                      <a href="<?php echo base_url().'staff/pelajaran_edit/'.$data['id_pelajaran']; ?>" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'staff/pelajaran_delete/'.$data['id_pelajaran']; ?>';" class="btn btn-danger">Delete</a>
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