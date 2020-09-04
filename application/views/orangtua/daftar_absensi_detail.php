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

          <h2 class="section-title"><?php echo $title2; ?></h2>
          <p class="section-lead">
              <?php echo $title3; ?>
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
                          <th>Hari & Tanggal</th>
                          <th>Pertemuan ke</th>
                          <th>Keterangan</th>
                        </tr>
                        <?php 
                        // print_r($lists);
                        foreach ($lists as $data) {
                          if ($data['nis'] == $_SESSION['nis']) {
                              ?>
                        <tr>
                          <td>
                          <?php 
                          echo date("l, d F Y",strtotime($data['tanggal']));
                          // echo date_format($data['tanggal'], "l, d F Y");
                          ?>
                          </td>
                          <td class="align-middle">
                            <?php echo $data['pertemuan']; ?>
                          </td>
                          <td>
                            <?php echo $data['keterangan']; ?>
                          </td>
                        </tr>
                            <?php
                          }
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