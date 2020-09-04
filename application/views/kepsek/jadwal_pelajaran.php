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
        <div class="breadcrumb-item"><a href="#">Jadwal Pelajaran</a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Jadwal Pelajaran</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Senin</th>
                  <th>Selasa</th>
                  <th>Rabu</th>
                  <th>Kamis</th>
                  <th>Jum'at</th>
                </tr>
                <tr>

                  <?php 
                    $senin = '';
                    $selasa = '';
                    $rabu = '';
                    $kamis = '';
                    $jumat = '';

                    $jadwal = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','jadwal');
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
               </tr>


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