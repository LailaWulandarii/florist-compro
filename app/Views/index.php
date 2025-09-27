<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<article>

  <!-- slider -->
  <section class="section hero" id="beranda" aria-label="hero">
    <div class="container">
      <div class="hero-content">
        <h1 class="h1 hero-title">
          <?= $lang === 'id' ? $slider[0]['caption_slider_id'] : $slider[0]['caption_slider_en']; ?>
        </h1>
      </div>

      <div class="hero-carousel">
        <?php foreach ($slider as $index => $slide): ?>
          <div class="slide <?= $index === 0 ? 'active' : ''; ?>">
            <img src="<?= base_url('assets/img/slider/' . $slide['foto_slider']) ?>"
              alt="<?= $lang === 'id' ? $slide['alt_foto_slider_id'] : $slide['alt_foto_slider_en']; ?>">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- about -->
  <section class="section tentang has-bg-image" id="tentang" aria-label="tentang"
    style="background-color: var(--light-pink)">
    <div class="container">

      <figure class="tentang-banner">
        <img src="<?= base_url('assets/img/profil/' . $profil['foto_perusahaan']); ?>" alt="<?= $lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']; ?>" style="border-radius: 30px;" width="355" height="356"
          loading="lazy" alt="tentang banner" class="w-100">
      </figure>

      <div class="tentang-content">

        <p class="section-subtitle has-before">
          <?= $lang == 'id' ? $aboutMeta['nama_halaman_id'] : $aboutMeta['nama_halaman_en']; ?>
        </p>
        <h2 class="h2 section-title">
          <span class="has-before"><?= $lang == 'id' ? $aboutMeta['deskripsi_halaman_id'] : $aboutMeta['deskripsi_halaman_en']; ?> |</span>
        </h2>
        <p class="card-text">
          <?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?>
        </p>
        <br>
        <a href="<?= base_url($lang == 'id' ? 'id/tentang' : 'en/about') ?>" class="button-text button-bg">
          <?= lang('bahasa.Baca Selengkapnya'); ?>
        </a>
      </div>

    </div>
  </section>

  <!-- produk -->
  <section class=" section produk" id="produk" aria-label="produk">
    <div class="container">

      <p class="section-subtitle has-before text-left">
        <?= $lang == 'id' ? $productMeta['nama_halaman_id'] : $productMeta['nama_halaman_en']; ?>
      </p>

      <div class="row header-row">
        <h2 class="h2 section-title text-left">
          <?= $lang == 'id' ? $productMeta['deskripsi_halaman_id'] : $productMeta['deskripsi_halaman_en']; ?>
        </h2>
        <a class="h2 section-title text-right see-more" href="<?= base_url($lang == 'id' ? 'id/produk' : 'en/product'); ?>">
          <?= lang('bahasa.Lihat Semua'); ?>
        </a>
      </div>

      <ul class="grid-list">
        <?php foreach (array_slice($product, 0, 5) as $p): ?>
          <li>
            <div class="produk-card">
              <figure class="card-banner img-holder" style="--width: 416; --height: 429;">
                <img src="<?= base_url('assets/img/produk/' . $p['foto_produk']); ?>"
                  alt="<?= $lang == 'id' ? $p['alt_produk_id'] : $p['alt_produk_en']; ?>"
                  class="img-cover" loading="lazy">
              </figure>
              <div class="card-content">
                <h4 class="h4">
                  <a href="<?= base_url($lang == 'id'
                              ? 'id/produk/' . $p['slug_id']
                              : 'en/product/' . $p['slug_en']); ?>"
                    class="card-title">
                    <?= $lang == 'id' ? $p['nama_produk_id'] : $p['nama_produk_en']; ?>
                  </a>
                </h4>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>


    </div>
  </section>

  <!-- aktivitas -->
  <section class="section aktivitas" id="aktivitas" aria-label="aktivitas">
    <div class="container">
      <p class="section-subtitle has-before text-left">
        <?= $lang == 'id' ? $aktivitasMeta['nama_halaman_id'] : $aktivitasMeta['nama_halaman_en']; ?>
      </p>

      <div class="row header-row">
        <h2 class="h2 section-title text-left">
          <?= $lang == 'id' ? $aktivitasMeta['deskripsi_halaman_id'] : $aktivitasMeta['deskripsi_halaman_en']; ?>
        </h2>
        <a href="<?= base_url($lang == 'id' ? 'id/aktivitas' : 'en/activity'); ?>" class="h2 section-title text-right see-more">
          <?= lang('bahasa.Lihat Semua'); ?>
        </a>
      </div>

      <ul class="grid-list aktivitas-list">
        <?php foreach (array_slice($aktivitas, 0, 4) as $a): ?>
          <li>
            <a href="<?= base_url(
                        $lang == 'id'
                          ? 'id/aktivitas/' . (!empty($a['slug_kategori_id']) ? $a['slug_kategori_id'] : 'kategori-tidak-ditemukan') . '/' . (!empty($a['slug_aktivitas_id']) ? $a['slug_aktivitas_id'] : 'aktivitas-tidak-ditemukan')
                          : 'en/activity/' . (!empty($a['slug_kategori_en']) ? $a['slug_kategori_en'] : 'category-not-found') . '/' . (!empty($a['slug_aktivitas_en']) ? $a['slug_aktivitas_en'] : 'activity-not-found')
                      ); ?>" class="aktivitas-link">
              <div class="aktivitas-card">
                <img src="<?= base_url('assets/img/aktivitas/' . $a['foto_aktivitas']); ?>"
                  alt="<?= $lang == 'id' ? $a['alt_aktivitas_id'] : $a['alt_aktivitas_en']; ?>"
                  class="aktivitas-img" loading="lazy">

                <h3 class="h3" style="margin-top: 10px;"><?= $lang == 'id' ? $a['judul_aktivitas_id'] : $a['judul_aktivitas_en']; ?></h3>
                <div class="meta-row" style="display: flex; justify-content: center;">
                  <p class="kategori">
                    <?= $lang == 'id' ? $a['nama_kategori_id'] : $a['nama_kategori_en']; ?>
                  </p>
                </div>
                <p class="deskripsi">
                  <?= $lang == 'id' ? $a['deskripsi_aktivitas_id'] : $a['deskripsi_aktivitas_en']; ?>
                </p>
                <a href="<?= base_url(
                            $lang === 'id'
                              ? 'id/aktivitas/' . ($a['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($a['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                              : 'en/activity/' . ($a['slug_kategori_en'] ?? 'category-not-found') . '/' . ($a['slug_aktivitas_en'] ?? 'activity-not-found')
                          ); ?>" class="see-more" style="font-size: 1.4rem; margin-top: 10px;">
                  <?= lang('bahasa.Baca Selengkapnya'); ?>
                </a>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>


    </div>
  </section>

  <!-- artikel -->
  <section class="section blog" id="artikel" aria-label="artikel">
    <div class="container">

      <p class="section-subtitle text-center has-before">
        <?= $lang == 'id' ? $articleMeta['nama_halaman_id'] : $articleMeta['nama_halaman_en']; ?>
      </p>

      <h2 class="h2 section-title text-center">
        <?= $lang == 'id' ? $articleMeta['deskripsi_halaman_id'] : $articleMeta['deskripsi_halaman_en']; ?>
      </h2>

      <ul class="blog-list">

        <?php if (!empty($article)): ?>
          <li>
            <div class="blog-card large">
              <figure class="card-banner large-banner">
                <img src="<?= base_url('assets/img/artikel/' . $article[0]['foto_artikel']); ?>"
                  alt="<?= $lang == 'id' ? $article[0]['alt_artikel_id'] : $article[0]['alt_artikel_en']; ?>"
                  class="img-cover" loading="lazy">
              </figure>
              <div class="card-content">
                <div class="wrapper">
                  <a href="#" class="tag"><?= $lang == 'id' ? $article[0]['nama_kategori'] : $article[0]['nama_kategori']; ?></a>
                  <div class="publish-date">
                    <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                    <span class="span" style="font-size: 1.5rem;">
                      <?= date('F j, Y', strtotime($article[0]['created_at'])); ?>
                    </span>
                  </div>
                </div>
                <h3>
                  <a href="<?= base_url($lang == 'id'
                              ? 'id/artikel/' . $article[0]['slug_kategori_id'] . '/' . $article[0]['slug_artikel_id']
                              : 'en/article/' . $article[0]['slug_kategori_en'] . '/' . $article[0]['slug_artikel_en']); ?>"
                    class="card-title">
                    <?= $lang == 'id' ? $article[0]['judul_artikel_id'] : $article[0]['judul_artikel_en']; ?>
                  </a>
                </h3>
                <p class="card-text" style="margin-top: 0;">
                  <?= $lang == 'id' ? $article[0]['snippet_id'] : $article[0]['snippet_en']; ?>
                </p>
                <a class="see-more" style="font-size: 1.3rem; margin-top: 10px;"
                  href="<?= base_url($lang == 'id'
                          ? 'id/artikel/' . $article[0]['slug_kategori_id'] . '/' . $article[0]['slug_artikel_id']
                          : 'en/article/' . $article[0]['slug_kategori_en'] . '/' . $article[0]['slug_artikel_en']); ?>">
                  <?= lang('bahasa.Baca Selengkapnya'); ?>
                </a>
              </div>
            </div>
          </li>
        <?php endif; ?>

        <?php foreach (array_slice($sideArtikel, 0, 3) as $a): ?>
          <li>
            <div class="blog-card">
              <figure class="card-banner standard-banner">
                <img src="<?= base_url('assets/img/artikel/' . $a['foto_artikel']); ?>"
                  alt="<?= $lang == 'id' ? $a['alt_artikel_id'] : $a['alt_artikel_en']; ?>"
                  class="img-cover" loading="lazy">
              </figure>
              <div class="card-content standard-card">
                <div class="wrapper">
                  <a href="#" class="tag"><?= $lang == 'id' ? $a['nama_kategori'] : $a['nama_kategori']; ?></a>
                </div>
                <h3 class="h3">
                  <a href="<?= base_url($lang == 'id'
                              ? 'id/artikel/' . $a['slug_kategori_id'] . '/' . $a['slug_artikel_id']
                              : 'en/article/' . $a['slug_kategori_en'] . '/' . $a['slug_artikel_en']); ?>"
                    class="card-title">
                    <?= $lang == 'id' ? $a['judul_artikel_id'] : $a['judul_artikel_en']; ?>
                  </a>
                </h3>
              </div>
            </div>
          </li>
        <?php endforeach; ?>

      </ul>
    </div>
  </section>

  <!-- kontak -->
  <section class="section blog" id="kontak" aria-label="kontak">
    <div class="container">

      <p class="section-subtitle text-center has-before">
        <?= $lang == 'id' ? $contactMeta['nama_halaman_id'] : $contactMeta['nama_halaman_en']; ?>
      </p>

      <p class="section-subtitle text-center" style="margin-bottom: 40px; margin-top: 10px; color: var(--raisin-black-1);">
        <?= $lang == 'id' ? $contactMeta['deskripsi_halaman_id'] : $contactMeta['deskripsi_halaman_en']; ?>
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