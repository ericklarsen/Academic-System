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

      <h2 class="section-title">
        Kategori Sanksi
      </h2>
      <p class="section-lead">
        Berikut adalah kategori sanksi yang dilakukan murid.
      </p>

      <div class="form-group col-12 col-md-6 col-lg-6">
        <a href="<?php echo base_url().'bk/tambah_kategori_sanksi/'; ?>" class="btn btn-primary mr-1" type="submit">Tambah Kategori Sanksi</a>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tabel Daftar Kategori Sanksi</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped">
                  <tr>
                    <th>Level</th>
                    <th>Sub Level</th>
                    <th>Action</th>
                  </tr>

                  <?php foreach ($lists as $data) {
                      ?>
                      <tr>
                        <td><?php echo $data['level']; ?></td>
                        <td><?php echo $data['sublevel']; ?></td>
                        <td>
                            <a href="<?php echo base_url().'bk/edit_kategori_sanksi/'.$data['id_ksanksi']; ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'bk/hapus_kategori_sanksi/'.$data['id_ksanksi']; ?>';">Hapus</a>
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