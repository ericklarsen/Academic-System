<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- General JS Scripts -->
<script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>


<script>
  $(document).ready(function() {

    $("#btn-tambah-soal").click(function() {
      var jumlah = parseInt($("#jumlah-form").val());
      var nextform = jumlah + 1;


      $("#insert-soal").append(`
      <div class='form-group' id="soal${jumlah}">
    <div class='rowHeader'>
        <label>#Soal</label>
        <button type="button" onclick="delSoal('soal${jumlah}')">
            <i class='fas fa-trash'></i> <span>Delete</span>
        </button>
    </div>
    <textarea name='isi[]' class='form-control' placeholder='Soal . . .'></textarea>
    <div class='optionTest'>
        <div class='optionTest_opsi'>
            <label>Pilihan A</label>
            <input name='a[]' type='text' class='form-control' placeholder='....'>
        </div>
        <div class='optionTest_opsi'>
            <label>Pilihan B</label>
            <input name='b[]' type='text' class='form-control' placeholder='....'>
        </div>
        <div class='optionTest_opsi'>
            <label>Pilihan C</label>
            <input name='c[]' type='text' class='form-control' placeholder='....'>
        </div>
        <div class='optionTest_opsi'>
            <label>Pilihan D</label>
            <input name='d[]' type='text' class='form-control' placeholder='....'>
        </div>
        <div class='optionTest_opsi'>
            <label>Pilihan E</label>
            <input name='e[]' type='text' class='form-control' placeholder='....'>
        </div>
        <div class='optionTest_opsi'>
            <label>Jawaban</label>
            <select name='jawaban[]' class='form-control'>
                <option value='a'>A</option>
                <option value='b'>B</option>
                <option value='c'>C</option>
                <option value='d'>D</option>
                <option value='e'>E</option>
            </select>
        </div>
    </div>
</div>`);
      $("#jumlah-form").val(nextform);
    });
  });

  function delSoal(param1) {
    var confirms = confirm("Yakin hapus?")
    confirms ? (
      $("#" + param1).html("")
    ) : (
      ""
    )
  }
</script>

<script>
  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#kategori_add").click(function() { // Ketika tombol Tambah Data Form di klik
      var kategori = document.getElementById("kategori").value; // Ambil jumlah data form pada textbox jumlah-form
      // var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
      var nilai = document.getElementById("nilai").value;

      if (kategori === "Rendah") {
        $("#insert-subkategori").html("<label>Sub Kategori</label>" +
          "<select name='id_ksanksi' class='form-control'>" +
          <?php
          $kategori = $this->Staff_model->ambil_data_id_array('Rendah', 'level', 'kategori_sanksi');
          foreach ($kategori as $data) {
          ?> "<option value='<?php echo $data['id_ksanksi'] ?>'><?php echo $data['sublevel']; ?></option>" +
          <?php } ?> "</select>");

        $("#insert-penanganan").html("<label>Penanganan/Sanksi yang diberikan</label>" +
          "<input type='text' name='penanganan' class='form-control'>");

      } else if (kategori === "Sedang") {
        $("#insert-subkategori").html("<label>Sub Kategori</label>" +
          "<select name='id_ksanksi' class='form-control'>" +
          <?php
          $kategori = $this->Staff_model->ambil_data_id_array('Sedang', 'level', 'kategori_sanksi');
          foreach ($kategori as $data) {
          ?> "<option value='<?php echo $data['id_ksanksi'] ?>'><?php echo $data['sublevel']; ?></option>" +
          <?php } ?> "</select>");

        $("#insert-penanganan").html("<label>Penanganan/Sanksi yang diberikan</label>" +
          "<input type='text' name='penanganan' class='form-control'>");

      } else if (kategori === "Tinggi") {
        $("#insert-subkategori").html("<label>Sub Kategori</label>" +
          "<select name='id_ksanksi' class='form-control'>" +
          <?php
          $kategori = $this->Staff_model->ambil_data_id_array('Tinggi', 'level', 'kategori_sanksi');
          foreach ($kategori as $data) {
          ?> "<option value='<?php echo $data['id_ksanksi'] ?>'><?php echo $data['sublevel']; ?></option>" +
          <?php } ?> "</select>");

        $("#insert-penanganan").html("<label>Penanganan/Sanksi yang diberikan</label>" +
          "<input type='text' name='penanganan' class='form-control'>");

      }



    });

  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-uh").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-uh").append("<br><input type='text' name='uh[]'' class='form-control'>");

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-uh").click(function() {
      $("#insert-uh").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-lisan").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-lisan").append("<br><input type='text' name='lisan[]'' class='form-control'>");

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-lisan").click(function() {
      $("#insert-uh").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-tugas").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-tugas").append("<br><input type='text' name='tugas[]'' class='form-control'>");

      $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });

    // Buat fungsi untuk mereset form ke semula
    $("#btn-reset-tugas").click(function() {
      $("#insert-tugas").html(""); // Kita kosongkan isi dari div insert-form
      $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
    });
  });

  

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-senin").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-senin").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya


      $("#insert-senin").append("<label>Pelajaran ke- " + nextform + "</label>" +
        <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?> "<select name='senin[]' class='form-control'>" +
        <?php foreach ($pelajaran as $data) { ?> <?php $guru = $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'user_staff'); ?> "<option value='<?php echo $data['id_pelajaran']; ?>'>" +
          "<?php echo $data['nama'] . ' - ' . $guru->nama; ?>" +
          "</option>" +
        <?php } ?> " </select>" +
        "<br>" +
        "<label>Jam</label>" +
        "<input type='text' name='jam1[]' class='form-control' value=''>" +
        "<br>");

      $("#jumlah-senin").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform

    });

  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-selasa").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-selasa").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-selasa").append("<label>Pelajaran ke- " + nextform + "</label>" +
        <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?> "<select name='selasa[]' class='form-control'>" +
        <?php foreach ($pelajaran as $data) { ?> <?php $guru = $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'user_staff'); ?> "<option value='<?php echo $data['id_pelajaran']; ?>'>" +
          "<?php echo $data['nama'] . ' - ' . $guru->nama; ?>" +
          "</option>" +
        <?php } ?> " </select>" +
        "<br>" +
        "<label>Jam</label>" +
        "<input type='text' name='jam2[]' class='form-control' value=''>" +
        "<br>");
      $("#jumlah-selasa").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform

    });



  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-rabu").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-rabu").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-rabu").append("<label>Pelajaran ke- " + nextform + "</label>" +
        <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?> "<select name='rabu[]' class='form-control'>" +
        <?php foreach ($pelajaran as $data) { ?> <?php $guru = $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'user_staff'); ?> "<option value='<?php echo $data['id_pelajaran']; ?>'>" +
          "<?php echo $data['nama'] . ' - ' . $guru->nama; ?>" +
          "</option>" +
        <?php } ?> " </select>" +
        "<br>" +
        "<label>Jam</label>" +
        "<input type='text' name='jam3[]' class='form-control' value=''>" +
        "<br>");
      $("#jumlah-rabu").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });



  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-kamis").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-kamis").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-kamis").append("<label>Pelajaran ke- " + nextform + "</label>" +
        <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?> "<select name='kamis[]' class='form-control'>" +
        <?php foreach ($pelajaran as $data) { ?> <?php $guru = $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'user_staff'); ?> "<option value='<?php echo $data['id_pelajaran']; ?>'>" +
          "<?php echo $data['nama'] . ' - ' . $guru->nama; ?>" +
          "</option>" +
        <?php } ?> " </select>" +
        "<br>" +
        "<label>Jam</label>" +
        "<input type='text' name='jam4[]' class='form-control' value=''>" +
        "<br>");
      $("#jumlah-kamis").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });



  });

  $(document).ready(function() { // Ketika halaman sudah diload dan siap
    $("#btn-tambah-jumat").click(function() { // Ketika tombol Tambah Data Form di klik
      var jumlah = parseInt($("#jumlah-jumat").val()); // Ambil jumlah data form pada textbox jumlah-form
      var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

      $("#insert-jumat").append("<label>Pelajaran ke- " + nextform + "</label>" +
        <?php $pelajaran = $this->Staff_model->ambil_data_semua('pelajaran'); ?> "<select name='jumat[]' class='form-control'>" +
        <?php foreach ($pelajaran as $data) { ?> <?php $guru = $this->Staff_model->ambil_data_id($data['nip'], 'nip', 'user_staff'); ?> "<option value='<?php echo $data['id_pelajaran']; ?>'>" +
          "<?php echo $data['nama'] . ' - ' . $guru->nama; ?>" +
          "</option>" +
        <?php } ?> " </select>" +
        "<br>" +
        "<label>Jam</label>" +
        "<input type='text' name='jam5[]' class='form-control' value=''>" +
        "<br>"
      );
      $("#jumlah-jumat").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
    });



  });
</script>



<!-- Template JS File -->
<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
</body>

</html>