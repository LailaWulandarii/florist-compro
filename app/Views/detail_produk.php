<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php
$lang = session()->get('lang') ?? 'id';
?>

<section class="section aktivitas" id="aktivitas" aria-label="aktivitas">
  <div class="container">
    <h1 class="h1 section-title text-center" style="margin-bottom: 10px; font-size: 4rem;">
      <span class="has-before"><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></span>
    </h1>
    <p class="section-subtitle text-center" style="margin-bottom: 0px;"> <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?> </p>
    <section class="section blog" id="blog" aria-label="blog">
      <div class="container">
        <ul class="blog-list">
          <li>
            <div class="blog-card large">

              <figure class="card-banner produk-banner">
                <img src="<?= base_url('assets/img/produk/' . $product['foto_produk']) ?>"
                  alt="<?= $lang === 'id' ? $product['alt_produk_id'] : $product['alt_produk_en'] ?>" class="img-cover">
              </figure>

            </div>
          </li>

          <li>
            <div class="blog-card">

              <div class="card-content">
                <h3 class="h3 card-title"><?= $lang === 'id' ? $product['nama_produk_id'] : $product['nama_produk_en'] ?></h3>
                <p><?= $lang === 'id' ? $product['deskripsi_produk_id'] : $product['deskripsi_produk_en'] ?></p>
              </div>

            </div>
          </li>

        </ul>

      </div>
    </section>
  </div>
</section>
<?= $this->endSection(); ?>