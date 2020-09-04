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

          <h2 class="section-title">Kelas <?php echo $kelas; ?></h2>
            <p class="section-lead">
              Berikut adalah daftar nilai dari seluruh murid untuk semua mata pelajaran.
            </p>


            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Nilai Semester Ganjil</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        $cek = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
                        $murid = $this->Staff_model->ambil_data_id_array($cek->id_kelas,'id_kelas','user_murid');
                        foreach ($murid as $data) {
                        ?>

                        <tr>
                          <td><?php echo $data['nama']; ?></td>
                          <td>
                            <a href="<?php echo base_url().'guru/rekap_nilai_detail/'.$cek->tingkat.'/ganjil/'.$data['nis']; ?>" class="btn btn-info">Lihat Detail</a>
                          </td>
                        </tr>
                        <?php
                        }
                         ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Tabel Nilai Semester Genap</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Nama</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        $cek = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas');
                        $murid = $this->Staff_model->ambil_data_id_array($cek->id_kelas,'id_kelas','user_murid');
                        foreach ($murid as $data) {
                        ?>

                        <tr>
                          <td><?php echo $data['nama']; ?></td>
                          <td>
                            <?php $cek2 = $this->Staff_model->ambil_data_id_3('genap','semester',$cek->tingkat,'tingkat',$data['nis'],'nis','nilai');
                            if ($cek2) {
                               ?>
                            <a href="<?php echo base_url().'guru/rekap_nilai_detail/'.$cek->tingkat.'/genap/'.$data['nis']; ?>" class="btn btn-info">Lihat Detail</a>
                               <?php
                             }else{
                              ?>
                            <a href="#" class="btn btn-secondary">Nilai Belum Ada</a>

                              <?php
                             } ?>
                          </td>
                        </tr>
                        <?php
                        }
                         ?>
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