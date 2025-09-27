<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<article>
  <section class="section tentang has-bg-image" id="tentang" aria-label="tentang"
    style="background-image: url('./assets/img/background-1.jpg')">
    <div class="container">
      <div class="tentang-content">
        <h1 class="h1 section-title">
          <span class="has-before" style="color: black;">
            <?= $lang == 'id' ? $meta['nama_halaman_id'] : $meta['nama_halaman_en']; ?>
          </span>
        </h1>
        <h2 class="text-c"><?= $profil['nama_perusahaan'] ?? 'Flo.do'; ?></h2>
      </div>
    </div>
    <div class="container">
      <figure class="tentang-banner">
        <img src="<?= base_url('assets/img/profil/' . $profil['foto_perusahaan']); ?>"
          alt="<?= $lang == 'id' ? $profil['alt_foto_perusahaan_id'] : $profil['alt_foto_perusahaan_en']; ?>"
          style="border-radius: 30px;" width="355" height="356" loading="lazy" class="w-100">
      </figure>

      <div class="tentang-content">
        <p class="card-text">
          <?= $lang == 'id' ? $profil['deskripsi_perusahaan_id'] : $profil['deskripsi_perusahaan_en']; ?>
        </p>
      </div>

    </div>
  </section>
</article>

<?= $this->endSection(); ?>