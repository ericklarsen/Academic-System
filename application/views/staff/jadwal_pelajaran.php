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
            <a href="<?php echo base_url(); ?>staff/tambah_jadwal_pelajaran" class="btn btn-lg btn-primary">Tambah Jadwal Pelajaran Baru</a>
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
                          <th>Senin</th>
                          <th>Selasa</th>
                          <th>Rabu</th>
                          <th>Kamis</th>
                          <th>Jum'at</th>
                          <th>Action</th>
                        </tr>
                        <?php 
                        
                        foreach ($lists as $data) {
                          $senin = '';
                        $selasa = '';
                        $rabu = '';
                        $kamis = '';
                        $jumat = '';
                        $jam1 = '';
                        $jam2 = '';
                        $jam3 = '';
                        $jam4 = '';
                        $jam5 = '';
                        ?>
                        <tr>
                          <td>
                            <b>
                              <?php echo $data['tingkat'].' '.strtoupper($data['jurusan']).' '.strtoupper($data['kelas']); ?>
                              </b>
                          </td>
                          <?php 
                          $jadwal = $this->Staff_model->ambil_data_id_array($data['id_kelas'],'id_kelas','jadwal');
                          foreach ($jadwal as $datas) {
                             $pelajaran = $this->Staff_model->ambil_data_id($datas['id_pelajaran'],'id_pelajaran','pelajaran');
                             if ($datas['hari'] == 'senin') {
                               $senin .= '<br> <b>- </b>'.$pelajaran->nama.'<br><small><b>Jam ('.$datas['jam'].')</b></small><br><br>';
                             }elseif ($datas['hari'] == 'selasa') {
                               $selasa .= '<br> <b>- </b>'.$pelajaran->nama.'<br><small><b>Jam ('.$datas['jam'].')</b></small><br><br>';
                             }elseif ($datas['hari'] == 'rabu') {
                               $rabu .= '<br> <b>- </b>'.$pelajaran->nama.'<br><small><b>Jam ('.$datas['jam'].')</b></small><br><br>';
                             }elseif ($datas['hari'] == 'kamis') {
                               $kamis .= '<br> <b>- </b>'.$pelajaran->nama.'<br><small><b>Jam ('.$datas['jam'].')</b></small><br><br>';
                             }elseif ($datas['hari'] == 'jumat') {
                               $jumat .= '<br> <b>- </b>'.$pelajaran->nama.'<br><small><b>Jam ('.$datas['jam'].')</b></small><br><br>';
                             }
                           } 
                           ?>
                           <td>
                             <?php echo $senin; ?>
                           </td>
                           <td>
                             <?php echo $selasa; ?>
                           </td>
                           <td>
                             <?php echo $rabu; ?>
                           </td>
                           <td>
                             <?php echo $kamis; ?>
                           </td>
                           <td>
                             <?php echo $jumat; ?>
                           </td>
                          <td>
                            <?php 
                            $cek = $this->Staff_model->ambil_data_id_array($data['id_kelas'],'id_kelas','jadwal');
                            if ($cek) {
                            ?>
                            <a href="<?php echo base_url().'/staff/edit_jadwal_pelajaran/'.$data['id_kelas'] ?>" class="btn btn-warning">Edit</a>
                            <a href="#" class="btn btn-danger" class="btn btn-danger" data-confirm="Informasi|Apakah kamu ingin tetap menghapus data ini?" data-confirm-yes="window.location.href = '<?php echo base_url().'/staff/jadwal_pelajaran_delete/'.$data['id_kelas'] ?>';" class="btn btn-danger">Delete</a>
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