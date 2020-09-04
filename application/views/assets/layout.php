<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <?php if ($_SESSION['jabatan'] == "ortu"){
              ?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo 'Orang tua/Wali'; ?></div>
              <?php
            }else{
              ?>
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $_SESSION['nama']; ?></div>
              <?php
            }
               ?>
          </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Pengaturan</div>
              
              <?php 
              if ($_SESSION['jabatan'] == "tu" || $_SESSION['jabatan'] == "guru"|| $_SESSION['jabatan'] == "kepsek"|| $_SESSION['jabatan'] == "bk") {
              ?>
              <a href="<?php echo base_url(); ?>staff/akun" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Data Diri
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url(); ?>staff/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <?php
              }elseif ($_SESSION['jabatan'] == "siswa"){
               ?>
               <a href="<?php echo base_url(); ?>siswa/akun" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Data Diri Siswa
              </a>
              <div class="dropdown-divider"></div>
               <a href="<?php echo base_url(); ?>siswa/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <?php }elseif ($_SESSION['jabatan'] == "ortu"){
               ?>
              <div class="dropdown-divider"></div>
               <a href="<?php echo base_url(); ?>ortu/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <?php } ?>
            </div>
          </li>
        </ul>
      </nav>
