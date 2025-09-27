<?php
$lang = session()->get('lang') ?? 'id';
$metaModel = new \App\Models\MetaModel();
$kontakModel = new \App\Models\KontakModel();

$meta = $metaModel->where('id_meta', '6')->first(); // Sesuaikan ID jika perlu
$kontak = $kontakModel->first();
?>

<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<article>
  <section class="section blog" id="kontak" aria-label="kontak">
    <div class="container">

      <p class="section-subtitle text-center has-before">
        <?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?>
      </p>

      <p class="section-subtitle text-center" style="margin-bottom: 40px; margin-top: 10px; color: var(--raisin-black-1);">
        <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
      </p>

      <ul class="blog-list">

        <li>
          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.724507302189!2d111.9013767759053!3d-7.601316592387556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e784b0027a0743b%3A0xd34e088a9b19702c!2sFlodo%20(Florist%20%26%20Self%20Photo%20Studio)%20Nganjuk!5e0!3m2!1sid!2sid!4v1690000000000!5m2!1sid!2sid"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen>
            </iframe>
          </div>

        </li>

        <li>
          <div class="blog-card">

            <div class="card-content">

              <div class="wrapper">
                <a href="#" class="tag ">Hubungi Kami</a>
              </div>

              <h4>
                <a style="margin-bottom: 20px; font-weight: 500;" href="#">
                  <?= $lang == 'id' ? $kontak['deskripsi_kontak_id'] : $kontak['deskripsi_kontak_en']; ?>
                </a>
              </h4>
            </div>

          </div>
        </li>


      </ul>
    </div>
  </section>

</article>
<?= $this->endSection(); ?>