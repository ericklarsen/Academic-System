<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('assets/header');
?>

<style>
  .optionWrap {}

  .rowHeader {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }

  .rowHeader>label {
    font-weight: 800;
    color: white;
    text-transform: uppercase;
    background-color: red;
    padding: 4px 12px;

  }

  .rowHeader>button {
    border: none;
    outline: none;
    background-color: red;
    cursor: pointer;
    color: white;
    border-radius: 20px;
    padding: 4px 12px;
    transition: all 350ms ease-in-out;
    font-size: 12px;
  }

  .rowHeader>button:hover {
    background-color: lightcoral;
  }

  .optionTest {
    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
    align-items: center;
  }

  .optionTest>.optionTest_opsi {
    margin: 10px 0;
    width: 33%;
  }

  .optionTest>.optionTest_opsi>label {
    font-size: 12px;
    font-weight: bold;
  }
</style>
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

      <div class="col-12 col-md-6 col-lg-12">

        <div class="card">
          <div class="card-header">
            <h4>List Soal Test</h4>
          </div>
          <div class="card-body">
            <form method="post" action="<?php echo base_url() . '/guru/aksi_update_soal_ujian'; ?>">

              <?php $soal = $this->Staff_model->ambil_data_id_array($id_elearning, 'id_elearning', 'soal_ujian');
              $i = 1;
              foreach ($soal as $data) {
              ?>
                <div class="form-group optionWrap" id="soal<?= $i?>">
                  <div class="rowHeader">
                    <label>#SOAL</label>
                    <button type="button" onclick="delSoal('soal<?= $i?>')">
                      <i class='fas fa-trash'></i> <span>Delete</span>
                    </button>
                  </div>
                  <textarea name="isi[]" class="form-control" placeholder="Soal . . ."> <?= $data['isi'] ?> </textarea>
                  <div class="optionTest">
                    <div class="optionTest_opsi">
                      <label>Pilihan A</label>
                      <input name="a[]" type="text" class="form-control" placeholder="...." value="<?php echo $data['a']; ?>">
                    </div>
                    <div class="optionTest_opsi">
                      <label>Pilihan B</label>
                      <input name="b[]" type="text" class="form-control" placeholder="...." value="<?php echo $data['b']; ?>">
                    </div>
                    <div class="optionTest_opsi">
                      <label>Pilihan C</label>
                      <input name="c[]" type="text" class="form-control" placeholder="...." value="<?php echo $data['c']; ?>">
                    </div>
                    <div class="optionTest_opsi">
                      <label>Pilihan D</label>
                      <input name="d[]" type="text" class="form-control" placeholder="...." value="<?php echo $data['d']; ?>">
                    </div>
                    <div class="optionTest_opsi">
                      <label>Pilihan E</label>
                      <input name="e[]" type="text" class="form-control" placeholder="...." value="<?php echo $data['e']; ?>">
                    </div>
                    <div class="optionTest_opsi">
                      <label>Jawaban</label>
                      <?php
                      $jawaban = array(
                        'a'       => 'A',
                        'b'       => 'B',
                        'c'       => 'C',
                        'd'       => 'D',
                        'e'       => 'D',
                      );
                      echo form_dropdown(
                        array('name' => 'jawaban[]', 'class' => 'form-control'),
                        $jawaban,
                        $data['jawaban']
                      );
                      ?>
                    </div>
                  </div>
                  <br>
                </div>
              <?php
              } ?>


              <div id="insert-soal"></div>
              <input type="hidden" id="jumlah-form" value="<?php echo count($soal) + 1; ?>">
              <button id="btn-tambah-soal" class="btn btn-primary mr-1" type="button">Tambah Soal</button>

              <input type="hidden" name="id_elearning" value="<?php echo $id_elearning; ?>">

              <div class="card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">Update</button>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div>


</div>
</section>
</div>
<?php $this->load->view('assets/footer'); ?>