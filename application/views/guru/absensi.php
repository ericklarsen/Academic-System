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
                          <th>Kelas</th>
                          <th>Jumlah Murid</th>
                          <th>Pelajaran</th>
                          <th>Action</th>
                        </tr>
                        <tr>
                          <td>
                            <a href="#" class="btn btn-outline-primary">10 IPA 1</a>
                          </td>
                          <td class="align-middle">
                            32 murid
                          </td>
                          <td><div class="badge badge-info">English Biology</div></td>
                          <td>
                            <a href="<?php echo base_url(); ?>guru/absensi_list" class="btn btn-info">Isi Absensi</a>
                          </td>
                        
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