<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <article>

  <!-- 
        - #AKTIVITAS
      -->

  <section class="section aktivitas" id="aktivitas" aria-label="aktivitas">
    <div class="container">
      <h1 class="h1 section-title text-center" style="margin-bottom: 10px; font-size: 4rem;">
        <span class="has-before"><?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?></span>
      </h1>
      <p class="section-subtitle text-center" style="margin-bottom: 0px;"> <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
      </p>
      <section class="section blog" id="blog" aria-label="blog">
        <div class="container">
          <ul class="blog-list">

            <?php if (!empty($allArticle)): ?>
              <li>
                <div class="blog-card large">
                  <figure class="card-banner large-banner">
                    <img src="<?= base_url('assets/img/artikel/' . $allArticle[0]['foto_artikel']); ?>"
                      alt="<?= $lang == 'id' ? $allArticle[0]['alt_artikel_id'] : $allArticle[0]['alt_artikel_en']; ?>"
                      class="img-cover" loading="lazy">
                  </figure>
                  <div class="card-content">
                    <div class="wrapper">
                      <a href="#" class="tag"><?= $lang == 'id' ? $allArticle[0]['nama_kategori'] : $allArticle[0]['nama_kategori']; ?></a>
                      <div class="publish-date">
                        <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
                        <span class="span" style="font-size: 1.5rem;">
                          <?= date('F j, Y', strtotime($allArticle[0]['created_at'])); ?>
                        </span>
                      </div>
                    </div>
                    <h3>
                      <a href="<?= base_url($lang == 'id'
                                  ? 'id/artikel/' . $allArticle[0]['slug_kategori_id'] . '/' . $allArticle[0]['slug_artikel_id']
                                  : 'en/article/' . $allArticle[0]['slug_kategori_en'] . '/' . $allArticle[0]['slug_artikel_en']); ?>"
                        class="card-title" style="margin-top: 10px;">
                        <?= $lang == 'id' ? $allArticle[0]['judul_artikel_id'] : $allArticle[0]['judul_artikel_en']; ?>
                      </a>
                    </h3>
                    <p class="card-text">
                      <?= $lang == 'id' ? $allArticle[0]['snippet_id'] : $allArticle[0]['snippet_en']; ?>
                    </p>
                    <a class="see-more" style="font-size: 1.3rem; margin-top: 10px;"
                      href="<?= base_url($lang == 'id'
                              ? 'id/artikel/' . $allArticle[0]['slug_kategori_id'] . '/' . $allArticle[0]['slug_artikel_id']
                              : 'en/article/' . $allArticle[0]['slug_kategori_en'] . '/' . $allArticle[0]['slug_artikel_en']); ?>">
                      <?= lang('bahasa.Baca Selengkapnya'); ?>
                    </a>
                  </div>
                </div>
              </li>
            <?php endif; ?>

            <?php foreach (array_slice($sideArticle, 0, 3) as $a): ?>
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
    </div>
  </section>


</article>
<?= $this->endSection(); ?>