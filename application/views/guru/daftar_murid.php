<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('assets/header');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>
        <?php echo $title2;?>
        <?php 
        $nama_kelas = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
        echo $nama_kelas->tingkat.' '.strtoupper($nama_kelas->jurusan).' '.strtoupper($nama_kelas->kelas);
        ?>
      </h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Kesiswaan</a></div>
        <div class="breadcrumb-item"><a href="#"><?php echo $title; ?></a></div>
        <div class="breadcrumb-item"><a href="#"><?php echo $title2; ?></a></div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Tabel Nilai Murid</h4>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped">
                <tr>
                  <th>Nama</th>
                  <th>UH</th>
                  <th>Lisan</th>
                  <th>Tugas</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th><i><b>Nilai Akhir</b></i></th>
                  <th><i><b>Predikat</b></i></th>
                  <th>Sikap Spritual</th>
                  <th>Sikap Sosial</th>
                  <th>Action</th>
                </tr>
                <?php 
                $cek1 = $this->Staff_model->ambil_data_id_array($id_kelas,'id_kelas','user_murid');
                $cek2 = $this->Staff_model->ambil_data_id($id_kelas,'id_kelas','kelas');
                foreach ($cek1 as $data) {
                  $nilai = $this->Staff_model->ambil_data_id_3($data['nis'],'nis',$id_pelajaran,'id_pelajaran',$cek2->semester,'semester','nilai');
                ?>
                <tr>
                  <td>
                    <?php echo $data['nama']; ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->uh;  ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->lisan;  ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->tugas;  ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->uts;  ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->uas;  ?>
                  </td>
                  <td>
                    <?php if($nilai) echo $nilai->nilai_akhir;  ?>
                  </td>
                   <td>
                    <?php if($nilai) echo $nilai->predikat;  ?>
                  </td>
                   <td>
                    <?php if($nilai)
                    if($nilai->spritual == '1'){
                      echo 'Baik';;
                    }elseif($nilai->spritual == '2'){
                      echo 'Cukup Baik';
                    }elseif($nilai->spritual == '3'){
                      echo 'Kurang Baik';
                    }  ?>
                  </td>
                   <td>
                    <?php if($nilai)
                    if($nilai->sosial == '1'){
                      echo 'Baik';;
                    }elseif($nilai->sosial == '2'){
                      echo 'Cukup Baik';
                    }elseif($nilai->sosial == '3'){
                      echo 'Kurang Baik';
                    }  ?>
                  </td>
                    <td>
                      <a href="<?php echo base_url().'guru/isi_nilai_murid/'.$data['nis'].'/'.$data['nama'].'/'.$id_pelajaran.'/'.$id_kelas; ?>" class="btn btn-warning">Isi Nilai</a>
                      <a href="<?php echo base_url().'guru/isi_nilai_sikap/'.$data['nis'].'/'.$data['nama'].'/'.$id_pelajaran.'/'.$id_kelas; ?>" class="btn btn-warning">Nilai Sikap</a>
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