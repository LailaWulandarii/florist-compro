<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?> <article>

  <!-- 
        - #AKTIVITAS
      -->

  <section class="section aktivitas" id="aktivitas" aria-label="aktivitas">
    <div class="container">
      <h1 class="h1 section-title text-center" style="margin-bottom: 10px; font-size: 4rem;">
        <span class="has-before">
          <?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?>
        </span>
      </h1>
      <p class="section-subtitle text-center" style="margin-bottom: 40px;">
        <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
      </p>

      <ul class="grid-list aktivitas-list">
        <?php foreach ($allAktivitas as $aktivitas) : ?>
          <li>
            <a href="<?= base_url($lang == 'id'
                        ? 'id/aktivitas/' . ($aktivitas['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($aktivitas['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                        : 'en/activity/' . ($aktivitas['slug_kategori_en'] ?? 'category-not-found') . '/' . ($aktivitas['slug_aktivitas_en'] ?? 'activity-not-found')); ?>"
              class="aktivitas-link">
              <div class="aktivitas-card">
                <img src="<?= base_url('assets/img/aktivitas/' . $aktivitas['foto_aktivitas']); ?>"
                  alt="<?= $lang == 'id' ? $aktivitas['alt_aktivitas_id'] : $aktivitas['alt_aktivitas_en']; ?>"
                  class="aktivitas-img" width="100" loading="lazy">

                <h3 class="h3">
                  <?= $lang == 'id' ? $aktivitas['judul_aktivitas_id'] : $aktivitas['judul_aktivitas_en']; ?>
                </h3>

                <div class="meta-row" style="display: flex; justify-content: center;">
                  <p class="kategori">
                    <?= $aktivitas['nama_kategori'] ?? ($lang == 'id' ? 'Tanpa Kategori' : 'Uncategorized'); ?>
                  </p>
                </div>

                <p class="deskripsi">
                  <?= $lang == 'id' ? $aktivitas['deskripsi_aktivitas_id'] : $aktivitas['deskripsi_aktivitas_en']; ?>
                </p>

                <a href="<?= base_url(
                            $lang === 'id'
                              ? 'id/aktivitas/' . ($aktivitas['slug_kategori_id'] ?? 'kategori-tidak-ditemukan') . '/' . ($aktivitas['slug_aktivitas_id'] ?? 'aktivitas-tidak-ditemukan')
                              : 'en/activity/' . ($aktivitas['slug_kategori_en'] ?? 'category-not-found') . '/' . ($aktivitas['slug_aktivitas_en'] ?? 'activity-not-found')
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


</article>
<?= $this->endSection(); ?>