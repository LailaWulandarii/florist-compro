<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <article>
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

                <figure class="card-banner large-banner">
                  <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas['foto_aktivitas']) ?>"
                    alt="<?= $lang === 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en'] ?>"
                    class="img-cover" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="wrapper">
                    <a href="#" class="tag">
                      <?= $lang === 'id' ? $aktivitas['nama_kategori_id'] : $aktivitas['nama_kategori_en'] ?>
                    </a>
                  </div>

                  <h3>
                    <a href="#" class="card-title">
                      <?= $lang === 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en'] ?>
                    </a>
                  </h3>

                  <p class="card-text">
                    <?= $lang === 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en'] ?>
                  </p>
                </div>

              </div>
            </li>
            <li>
              <div class="blog-card">

                <figure class="card-banner standard-banner">
                  <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas['foto_aktivitas']) ?>"
                    alt="<?= $lang === 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en'] ?>"
                    class="img-cover" loading="lazy">
                </figure>

                <div class="card-content standard-card">

                  <div class="wrapper">
                    <a href="#" class="tag">
                      <?= $lang === 'id' ? $aktivitas['nama_kategori_id'] : $aktivitas['nama_kategori_en'] ?>
                    </a>
                  </div>

                  <h3 class="h3">
                    <a href="#" class="card-title">
                      <?= $lang === 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en'] ?>
                    </a>
                  </h3>

                </div>

              </div>
            </li>

          </ul>
        </div>
      </section>
    </div>
  </section>


</article>
<?= $this->endSection(); ?>