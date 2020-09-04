<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
if ($_SESSION['jabatan'] == "tu") {
  ?>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>staff/home" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'murid' || $this->uri->segment(2) == 'kelas_detail' ? 'active' : ''; ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-columns"></i> <span>Kesiswaan</span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'kelas_detail' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>staff/kelas">
                Daftar kelas
              </a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'murid' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>staff/murid">
                Daftar murid
              </a>
            </li>
          </ul>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'kurikulum_pelajaran' 
        || $this->uri->segment(2) == 'kurikulum_kelas' || $this->uri->segment(2) == 'kurikulum_edit' || $this->uri->segment(2) == 'tambah_kurikulum' || $this->uri->segment(2) == 'tambah_pelajaran' || $this->uri->segment(2) == 'pelajaran_edit' ? 'active' : ''; ?>">
        <a class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="far fa-square"></i> 
          <span>Kurikulum</span>
        </a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'kurikulum_pelajaran'|| $this->uri->segment(2) == 'tambah_pelajaran' || $this->uri->segment(2) == 'pelajaran_edit'  ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>staff/kurikulum_pelajaran">
              Daftar Pelajaran
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'jadwal_pelajaran'|| $this->uri->segment(2) == 'tambah_jadwal_pelajaran' || $this->uri->segment(2) == 'edit_jadwal_pelajaran'  ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>staff/jadwal_pelajaran">
              Jadwal Pelajaran
            </a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'kurikulum_kelas' || $this->uri->segment(2) == 'kurikulum_edit' || $this->uri->segment(2) == 'tambah_kurikulum' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>staff/kurikulum_kelas">
              Daftar Kurikulum
            </a>
          </li>
        </ul>
      </li>

      <li class="dropdown <?php echo $this->uri->segment(2) == 'staff' || $this->uri->segment(2) == 'tambah_staff' || $this->uri->segment(2) == 'staff_edit'? 'active' : ''; ?>">
        <a href="#" class="nav-link has-dropdown">
          <i class="fas fa-th"></i> 
          <span>Kepegawaian</span>
        </a>
        <ul class="dropdown-menu">
          <li class="<?php echo $this->uri->segment(2) == 'staff' || $this->uri->segment(2) == 'tambah_staff' || $this->uri->segment(2) == 'staff_edit' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>staff/staff">
              Daftar staff
            </a>
          </li>
        </ul>
      </li>


      <li class="menu-header">Lain-lain</li>
      <li class="<?php echo $this->uri->segment(2) == 'pengumuman' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>staff/pengumuman">
          <i class="fas fa-pencil-ruler"></i> <span>Pengumuman</span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'registrasi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>staff/registrasi">
          <i class="fas fa-book"></i> <span>Registrasi</span>
        </a>
      </li>

       
 
    </aside>
  </div>
  <?php
}elseif ($_SESSION['jabatan'] == "guru") {
  ?>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>guru" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'murid' || $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'absensi_list'|| $this->uri->segment(2) == 'absensi_list_detail' || $this->uri->segment(2) == 'isi_absensi' || $this->uri->segment(2) == 'isi_nilai_murid'|| $this->uri->segment(2) == 'absensi_list_detail_edit' || $this->uri->segment(2) == 'soal_ujian_online' || $this->uri->segment(2) == 'tambah_soal_ujian_online' || $this->uri->segment(2) == 'soal_ujian_online_nilai' || $this->uri->segment(2) == 'absensi_list' ? 'active' : ''; ?>">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-columns"></i> <span>Kesiswaan</span>
          </a>
          <ul class="dropdown-menu">
            <li class="<?php echo $this->uri->segment(2) == 'kelas' || $this->uri->segment(2) == 'murid' || $this->uri->segment(2) == 'isi_nilai_murid' || $this->uri->segment(2) == 'absensi_list' || $this->uri->segment(2) == 'absensi_list_detail' || $this->uri->segment(2) == 'absensi_list_detail_edit' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/kelas">
                Daftar kelas diampuh
              </a>
            </li>
            <!-- <li class="<?php echo $this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'absensi_list_detail_edit'|| $this->uri->segment(2) == 'absensi_list_detail'|| $this->uri->segment(2) == 'isi_absensi'|| $this->uri->segment(2) == 'absensi_list' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/absensi">
                Absensi
              </a>
            </li> -->

            <li class="<?php echo $this->uri->segment(2) == 'soal_ujian_online' || $this->uri->segment(2) == 'tambah_soal_ujian_online' || $this->uri->segment(2) == 'soal_ujian_online_nilai' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/soal_ujian_online">
                Soal Ujian Online
              </a>
            </li>
          </ul>
        </li>

        <?php 
        $wali = $this->Staff_model->ambil_data_id($_SESSION['nip'],'nip','kelas'); 
        if ($wali != null) {
          ?>
          <li class="dropdown <?php echo $this->uri->segment(2) == 'rekap_absensi' ||$this->uri->segment(2) == 'rekap_absensi_detail2' || $this->uri->segment(2) == 'rekap_absensi_detail' || $this->uri->segment(2) == 'rekap_sanksi' || $this->uri->segment(2) == 'rekap_nilai' || $this->uri->segment(2) == 'rekap_nilai_detail' || $this->uri->segment(2) == 'rekap_nilai_detail_2' || $this->uri->segment(2) == 'isi_nilai_sikap'|| $this->uri->segment(2) == 'nilai_sikap' || $this->uri->segment(2) == 'tambah_sanksi' || $this->uri->segment(2) == 'regis_semester' ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
              <i class="fas fa-columns"></i> <span>Wali Kelas</span>
            </a>
            <ul class="dropdown-menu">
              <li class="<?php echo $this->uri->segment(2) == 'rekap_absensi' ||$this->uri->segment(2) == 'rekap_absensi_detail2' || $this->uri->segment(2) == 'rekap_absensi_detail'  ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>guru/rekap_absensi">
                 Rekap Absensi
               </a>
             </li>
             <li class="<?php echo $this->uri->segment(2) == 'rekap_sanksi' || $this->uri->segment(2) == 'tambah_sanksi' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/rekap_sanksi">
                Rekap Sanksi
              </a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'rekap_nilai' || $this->uri->segment(2) == 'rekap_nilai_detail' || $this->uri->segment(2) == 'rekap_nilai_detail_2'  ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/rekap_nilai">
                Rekap Nilai 
              </a>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'rekap_prestasi' || $this->uri->segment(2) == '' || $this->uri->segment(2) == ''  ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/rekap_prestasi">
                Rekap Prestasi 
              </a>
            </li>

            <?php 
            $regis = $this->Staff_model->ambil_data_id('on','status','registrasi_semester');
            if ($regis) {
            ?>

            <li class="<?php echo $this->uri->segment(2) == 'regis_semester' ? 'active' : ''; ?>">
              <a class="nav-link" href="<?php echo base_url(); ?>guru/regis_semester">
                Registrasi Semester
              </a>
            </li>
            
            <?php
            }
             ?>


         </ul>
       </li>
       <?php
     }
     ?>




     
  </aside>
</div>
<?php
}elseif($_SESSION['jabatan'] == "siswa"){
  ?>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>siswa/home" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'daftar_nilai' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>siswa/daftar_nilai" class="nav-link">
            <i class="fas fa-columns"></i><span>Daftar Nilai</span>
          </a>
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == 'ujian_online_run' || $this->uri->segment(2) == 'ujian_online' || $this->uri->segment(2) == 'ujian_online_mulai' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>siswa/ujian_online" class="nav-link">
            <i class="fas fa-edit"></i><span>Ujian Online</span>
          </a>
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'daftar_sanksi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>siswa/daftar_sanksi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Sanksi</span>
          </a>
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'jadwal_pelajaran' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>siswa/jadwal_pelajaran" class="nav-link">
            <i class="fas fa-list"></i><span>Jadwal Pelajaran</span>
          </a>
        </li>

         
 
      </aside>
    </div>
    <?php
  }elseif ($_SESSION['jabatan'] == "bk") {
    ?>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>
      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>bk/home" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'daftar_sanksi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>bk/rekap_sanksi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Sanksi</span>
          </a>
        </li>

         
 
      </aside>
    </div>
    <?php
  }elseif ($_SESSION['jabatan'] == "ortu") {
    ?>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>

      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>

      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/home" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'rekap_absensi_detail' || $this->uri->segment(2) == 'rekap_absensi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/rekap_absensi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Absensi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'rekap_nilai_detail_2' || $this->uri->segment(2) == 'rekap_nilai' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/rekap_nilai" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Nilai</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'rekap_sanksi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/rekap_sanksi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Sanksi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'rekap_prestasi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/rekap_prestasi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Prestasi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'tambah_jadwal_pelajaran' || $this->uri->segment(2) == 'jadwal_pelajaran' || $this->uri->segment(2) == 'edit_jadwal_pelajaran' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>ortu/jadwal_pelajaran" class="nav-link">
            <i class="fas fa-list"></i><span>Jadwal Pelajaran</span>
          </a>
        </li>

         
 
      </aside>
    </div>
    <?php
  }elseif ($_SESSION['jabatan'] == 'kepsek') {
    ?>
    <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="<?php echo base_url(); ?>dist/index">
          <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" width="50" class="shadow-light rounded-circle">
        </a>
      </div>

      <div class="sidebar-brand sidebar-brand-sm">
        <a href="<?php echo base_url(); ?>dist/index">St</a>
      </div>

      <ul class="sidebar-menu">

        <li class="menu-header">
          Beranda
        </li>
        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/home" class="nav-link">
            <i class="fas fa-fire"></i><span>Beranda</span>
          </a>
        </li>

        <li class="menu-header">
          Data
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'rekap_absensi_detail' || $this->uri->segment(2) == 'absensi_list_detail' || $this->uri->segment(2) == 'rekap_absensi_list' || $this->uri->segment(2) == 'rekap_absensi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/rekap_absensi_list" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Absensi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'rekap_nilai_detail_2' || $this->uri->segment(2) == 'rekap_nilai_detail' || $this->uri->segment(2) == 'rekap_nilai_list' || $this->uri->segment(2) == 'rekap_nilai' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/rekap_nilai_list" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Nilai</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'rekap_sanksi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/rekap_sanksi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Sanksi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'rekap_prestasi' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/rekap_prestasi" class="nav-link">
            <i class="fas fa-list"></i><span>Daftar Prestasi</span>
          </a>
        </li>

        <li class="dropdown <?php echo $this->uri->segment(2) == 'jadwal_pelajaran_list' || $this->uri->segment(2) == 'jadwal_pelajaran' || $this->uri->segment(2) == 'edit_jadwal_pelajaran' ? 'active' : ''; ?>">
          <a href="<?php echo base_url(); ?>kepsek/jadwal_pelajaran_list" class="nav-link">
            <i class="fas fa-list"></i><span>Jadwal Pelajaran</span>
          </a>
        </li>

         
 
      </aside>
    </div>
    <?php
  }
  ?>

