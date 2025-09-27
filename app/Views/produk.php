<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<article>


  <section class=" section produk" id="produk" aria-label="produk">
    <div class="container">
      <h1 class="h1 section-title text-center" style="margin-bottom: 10px; font-size: 4rem;">
        <span class="has-before">
          <?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?>
        </span>
      </h1>
      <p class="section-subtitle text-center" style="margin-bottom: 50px;">
        <?= $lang == 'id' ? $meta['deskripsi_halaman_id'] : $meta['deskripsi_halaman_en']; ?>
      </p>


      <ul class="grid-list">
        <?php foreach ($product as $p) : ?>
          <li>
            <div class="produk-card">
              <figure class="card-banner img-holder">
                <img src="<?= base_url('assets/img/produk/' . $p['foto_produk']); ?>"
                  alt="<?= $lang == 'id' ? $p['alt_produk_id'] : $p['alt_produk_en']; ?>"
                  loading="lazy" class="img-cover">
              </figure>
              <div class="card-content">
                <h4 class="h4">
                  <a href="<?= base_url($lang == 'id'
                              ? 'id/produk/' . $p['slug_id']
                              : 'en/product/' . $p['slug_en']); ?>" class="card-title">
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
</article>
<?= $this->endSection(); ?>