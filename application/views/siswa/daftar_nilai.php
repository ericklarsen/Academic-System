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
        <div class="breadcrumb-item active"><a href="#"></a></div>
        <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
      </div>
    </div>
    <h2 class="section-title">Kelas 
        <?php
        $datas = $this->Staff_model->ambil_data_id($_SESSION['nis'],'nis','user_murid');
        $kelas = $this->Staff_model->ambil_data_id($datas->id_kelas,'id_kelas','kelas');
         echo $kelas->tingkat.' '.strtoupper($kelas->jurusan).' '.strtoupper($kelas->kelas) ?>
      </h2>
      <p class="section-lead">
        Berikut adalah daftar nilai per semester.
      </p>


    <div class="row">
      <div class="col-12 col-sm-6 col-lg-12">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#10s1" role="tab" aria-controls="home" aria-selected="true">Semester <?php echo $kelas->semester; ?></a>
              </li>
            </ul>

            <?php 
            $murid = $this->Staff_model->ambil_data_id($nis,'nis','user_murid'); 
            $kelas = $this->Staff_model->ambil_data_id($murid->id_kelas,'id_kelas','kelas'); 
            ?>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
                  <div class="card-header">
                    <h4>Nilai Pengetahuan</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Mata Pelajaran</th>
                          <th>Nilai</th>
                          <th>Predikat</th>
                        </tr>
                        <?php 
                        $nilai = $this->Staff_model->ambil_data_id_array_3($kelas->tingkat,'tingkat',$kelas->semester,'semester',$nis,'nis','nilai');

                        foreach ($nilai as $data) {
                          $pelajaran = $this->Staff_model->ambil_data_id($data['id_pelajaran'],'id_pelajaran','pelajaran');
                          ?>

                          <tr>
                            <td><?php echo $pelajaran->nama; ?></td>
                            <td><?php echo $data['nilai_akhir']; ?></td>
                            <td><?php echo $data['predikat']; ?></td>
                          </tr>

                          <?php
                        }
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Ketidakharian</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Keterangan</th>
                          <th>Jumlah</th>
                        </tr>
                        <?php $absensi = $this->Staff_model->ambil_data_id_array_2($nis,'nis',$murid->id_kelas,'id_kelas','absensi');
                        $sakit = 0;
                        $izin = 0;
                        $alpha = 0;
                        foreach ($absensi as $data) {
                          if ($data['keterangan'] == 'sakit') {
                            $sakit++;
                          }elseif ($data['keterangan'] == 'izin') {
                            $izin++;
                          }elseif($data['keterangan'] == 'alpha'){
                            $alpha++;
                          }
                        } 
                        ?>

                        <tr>
                          <td>Sakit</td>
                          <td><?php echo $sakit; ?> Hari</td>
                        </tr>

                        <tr>
                          <td>Izin</td>
                          <td><?php echo $izin; ?> Hari</td>
                        </tr>

                        <tr>
                          <td>Tanpa Keterangan</td>
                          <td><?php echo $alpha; ?> Hari</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                    <h4>Nilai Sikap</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>Keterangan</th>
                          <th>Predikat</th>
                        </tr>
                        <?php 
                        $sikap = $this->Staff_model->ambil_data_id_array_3($nis,'nis',$kelas->tingkat,'tingkat',$kelas->semester,'semester','nilai');
                        $spritual = 0;
                        $sosial = 0;
                        if ($sikap) {
                        foreach ($sikap as $data) {
                          $spritual += $data['spritual'];
                          $sosial += $data['sosial'];
                        }
                        $total1 = round($spritual/count($sikap),1);
                        $total2 = round($sosial/count($sikap), 0);
                        ?>
                        <tr>
                          <td>Sikap Spritual</td>
                          <td>
                            <?php 
                            if ($total1 == 3) {
                              echo 'Baik';
                            }elseif ($total1 == 2) {
                              echo 'Cukup';
                            }else{
                              echo 'Kurang Baik'; 
                            }
                            ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td>Sikap Sosial</td>
                          <td>
                            <?php 
                            if ($total2 == 3) {
                              echo 'Baik';
                            }elseif ($total2 == 2) {
                              echo 'Cukup';
                            }else{
                              echo 'Kurang Baik'; 
                            }
                        }
                            ?>
                            
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
  </section>
</div>
<?php $this->load->view('assets/footer'); ?>