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

      <div class="col-12 col-md-12 col-lg-12">
        <form method="post" action="<?php echo base_url() . '/guru/aksi_tambah_soal_ujian'; ?>">

          <div class="card">
            <div class="card-header">
              <h4>Form Soal</h4>
            </div>
            <div class="card-body">
              <div class="form-group optionWrap" id="soal1">
                <div class="rowHeader">
                  <label>#SOAL</label>
                </div>
                <textarea name="isi[]" class="form-control" placeholder="Soal . . ."></textarea>
                <div class="optionTest">
                  <div class="optionTest_opsi">
                    <label>Pilihan A</label>
                    <input name="a[]" type="text" class="form-control" placeholder="....">
                  </div>
                  <div class="optionTest_opsi">
                    <label>Pilihan B</label>
                    <input name="b[]" type="text" class="form-control" placeholder="....">
                  </div>
                  <div class="optionTest_opsi">
                    <label>Pilihan C</label>
                    <input name="c[]" type="text" class="form-control" placeholder="....">
                  </div>
                  <div class="optionTest_opsi">
                    <label>Pilihan D</label>
                    <input name="d[]" type="text" class="form-control" placeholder="....">
                  </div>
                  <div class="optionTest_opsi">
                    <label>Pilihan E</label>
                    <input name="e[]" type="text" class="form-control" placeholder="....">
                  </div>
                  <div class="optionTest_opsi">
                    <label>Jawaban</label>
                    <select name="jawaban[]" class="form-control">
                      <option value="a">A</option>
                      <option value="b">B</option>
                      <option value="c">C</option>
                      <option value="d">D</option>
                      <option value="e">E</option>
                    </select>
                  </div>
                </div>
                <br>
              </div>

              <div id="insert-soal"></div>
              <input type="hidden" id="jumlah-form" value="2">
              <button id="btn-tambah-soal" class="btn btn-primary mr-1" type="button">Tambah Soal</button>
            </div>

            <input type="hidden" name="id_elearning" value="<?php echo $id_elearning; ?>">

            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>


</div>
</section>
</div>

<?php $this->load->view('assets/footer'); ?>