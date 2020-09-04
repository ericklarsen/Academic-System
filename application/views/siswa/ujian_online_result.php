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

          <div class="col-12 mb-4">
                <div class="hero align-items-center bg-success text-white">
                  <div class="hero-inner text-center">
                    <h2>Selamat!</h2>
                    <p class="lead">Kamu telah menyelesaikan seluruh soal dengan tepat waktu.</p>
                    <div class="mt-4">
                      <a href="<?php echo base_url(); ?>siswa/ujian_online" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> Kembali</a>
                    </div>
                  </div>
                </div>
              </div>

            <div class="row">


            </div>


          </div>
        </section>
      </div>
<?php $this->load->view('assets/footer'); ?>