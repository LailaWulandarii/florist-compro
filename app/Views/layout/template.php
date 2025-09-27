<?php
// Ambil bahasa yang disimpan di session
$lang = session()->get('lang') ?? 'id'; // Default ke 'id' jika tidak ada di session

$current_url = uri_string();

// Ambil query string (misalnya ?keyword=sukses)
$query_string = $_SERVER['QUERY_STRING'] ?? ''; // Pastikan tidak ada error jika query string kosong

// Simpan segmen bahasa saat ini
$segments = explode('/', $current_url);
$lang_segment = $segments[0] ?? ''; // Ambil segmen pertama dari URL

// Pastikan hanya 'en' atau 'id' yang dianggap sebagai segmen bahasa
if ($lang_segment !== 'en' && $lang_segment !== 'id') {
    $lang_segment = 'id'; // Default ke 'id' jika segmen bahasa tidak ada
}

// Definisikan tautan untuk setiap halaman berdasarkan bahasa
$homeLink    = ($lang_segment === 'en') ? '/' : '/';
$aboutLink   = ($lang_segment === 'en') ? 'about' : 'tentang';
$contactLink = ($lang_segment === 'en') ? 'contact' : 'kontak';
$articleLink = ($lang_segment === 'en') ? 'article' : 'artikel';
$activityLink = ($lang_segment === 'en') ? 'activity' : 'aktivitas';
$productLink = ($lang_segment === 'en') ? 'product' : 'produk';

// Ambil bagian dari URL tanpa segmen bahasa
array_shift($segments); // Hapus segmen bahasa dari array
$url_without_lang = implode('/', $segments); // Gabungkan kembali sisa URL

// Tentukan bahasa yang ingin digunakan
$new_lang = ($lang_segment === 'en') ? 'id' : 'en';

// Mapping penggantian segmen dalam URL berdasarkan bahasa yang aktif
$replace_map = [
    'tentang' => 'about',
    'kontak' => 'contact',
    'artikel' => 'article',
    'aktivitas' => 'activity',
    'produk' => 'product',
];

foreach ($replace_map as $id => $en) {
    if ($lang_segment === 'en') {
        // Jika bahasa saat ini 'en', ubah ke 'id'
        $url_without_lang = str_replace($en, $id, $url_without_lang);
    } else {
        // Jika bahasa saat ini 'id', ubah ke 'en'
        $url_without_lang = str_replace($id, $en, $url_without_lang);
    }
}

// Buat URL yang bersih
$clean_url = ($url_without_lang !== '') ? "$new_lang/$url_without_lang" : $new_lang;

// Gabungkan query string jika ada
if (!empty($query_string)) {
    $clean_url .= '?' . $query_string;
}

// Tautan Bahasa Inggris & Indonesia
$english_url = base_url($clean_url);
$indonesia_url = base_url($clean_url);

// Tautan Kategori Artikel untuk Navbar
$categoryLinks = [];
if (!empty($categories)) {
    foreach ($categories as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $categoryLinks[] = [
            'url' => base_url("$lang/$articleLink/$slug"),
            'name' => $name
        ];
    }
}

// Tautan Kategori Aktivitas untuk Navbar
$kategoriAktivitasLinks = [];
if (!empty($categoriesAktivitas)) {
    foreach ($categoriesAktivitas as $cat) {
        $slug = ($lang === 'id') ? $cat['slug_kategori_id'] : $cat['slug_kategori_en'];
        $name = ($lang === 'id') ? $cat['nama_kategori_id'] : $cat['nama_kategori_en'];
        $kategoriAktivitasLinks[] = [
            'url' => base_url("$lang/$activityLink/$slug"),
            'name' => $name
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id'; ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($metaCategory)): ?>
        <title><?= $lang == 'id' ? $metaCategory['title_id'] : $metaCategory['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $metaCategory['meta_desc_id'] : $metaCategory['meta_desc_en']; ?>">
    <?php else: ?>
        <title><?= $lang == 'id' ? $meta['title_id'] : $meta['title_en']; ?></title>
        <meta name="description" content="<?= $lang == 'id' ? $meta['meta_desc_id'] : $meta['meta_desc_en']; ?>">
    <?php endif; ?>

    <link rel="canonical" href="<?= isset($canonical) && !empty($canonical) ? $canonical : base_url() ?>">

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="<?= base_url('favicon.ico'); ?>" type="image/svg+xml">

    <!-- 
    - custom css link
  -->
    <link rel="icon" href="<?= base_url('assets/img/logo2.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css'); ?>">
    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- 
    - preload img
  -->
    <link rel="preload" as="image" href="./assets/img/hero-banner.png">

</head>

<body id="top">

    <!-- 
    - #HEADER
  -->


    <header class="header" data-header>
        <div class="container">

            <a href="#" class="logo">Flo.do</a>
            <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
                <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
            </button>

            <nav class="navbar" data-navbar>

                <div class="wrapper">
                    <a href="#" class="logo">Flo.do</a>

                    <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <ul class="navbar-list">

                    <li class="navbar-item">
                        <a href="<?= base_url($lang . '/') ?>"
                            class="navbar-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'home' ? 'active' : '' ?>"
                            data-nav-link>
                            <?= lang('bahasa.Beranda'); ?>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="<?= base_url($lang . '/tentang') ?>"
                            class="navbar-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'tentang' ? 'active' : '' ?>"
                            data-nav-link>
                            <?= lang('bahasa.Tentang'); ?>
                        </a>
                    </li>
                    <li class="navbar-item">
                        <a href="<?= base_url($lang . '/produk') ?>"
                            class="navbar-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'produk' ? 'active' : '' ?>"
                            data-nav-link>
                            <?= lang('bahasa.Produk'); ?>
                        </a>
                    </li>

                    <!-- Dropdown Aktivitas -->
                    <?php
                    $uriSegments = explode('/', uri_string());
                    $currentPath = $uriSegments[1] ?? '';
                    $isActivityActive = ($currentPath === $activityLink);
                    ?>

                    <li class="navbar-item dropdown">
                        <a href="#" class="navbar-link dropdown-toggle <?= $isActivityActive ? 'active' : '' ?>" data-nav-link>
                            <span><?= lang('bahasa.Aktivitas'); ?></span>
                            <ion-icon name="chevron-down-outline" class="chevron-icon" aria-hidden="true"></ion-icon>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url($lang . '/' . $activityLink) ?>">
                                    <?= $lang == 'id' ? 'Semua Aktivitas' : 'All Activity'; ?>
                                </a>
                            </li>
                            <?php if (!empty($kategoriAktivitasLinks)): ?>
                                <?php foreach ($kategoriAktivitasLinks as $kategoriAktivitasLink): ?>
                                    <li>
                                        <a href="<?= $kategoriAktivitasLink['url']; ?>">
                                            <?= $kategoriAktivitasLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>


                    <!-- Dropdown blog -->
                    <li class="navbar-item dropdown">
                        <a href="#" class="navbar-link dropdown-toggle <?= (uri_string() === $articleLink || str_contains(uri_string(), $articleLink)) ? 'active' : '' ?>" data-nav-link>
                            <span><?= lang('bahasa.Artikel'); ?></span>
                            <ion-icon name="chevron-down-outline" class="chevron-icon" aria-hidden="true"></ion-icon>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= base_url($lang . '/' . $articleLink) ?>">
                                    <?= $lang == 'id' ? 'Semua Artikel' : 'All Article'; ?>
                                </a>
                            </li>
                            <?php if (!empty($categoryLinks)): ?>
                                <?php foreach ($categoryLinks as $categoryLink): ?>
                                    <li>
                                        <a href="<?= $categoryLink['url']; ?>">
                                            <?= $categoryLink['name']; ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><a><?= $lang == 'id' ? 'Tidak ada kategori' : 'No Categories available'; ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li class="navbar-item">
                        <a href="<?= base_url($lang . '/kontak') ?>"
                            class="navbar-link <?= isset($data['activeMenu']) && $data['activeMenu'] === 'kontak' ? 'active' : '' ?>"
                            data-nav-link>
                            <?= lang('bahasa.Kontak'); ?>
                        </a>
                    </li>

                    <!-- Dropdown Bahasa -->
                    <li class="navbar-item dropdown">
                        <a href="#" class="navbar-link dropdown-toggle" data-nav-link>
                            <span><?= ($lang === 'en') ? 'English' : 'Indonesia'; ?></span>
                            <ion-icon name="chevron-down-outline" class="chevron-icon" aria-hidden="true"></ion-icon>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?= $indonesia_url; ?>" class="<?= $lang === 'id' ? 'active disabled' : ''; ?>"> <img src="<?= base_url('assets/img/logo/indonesia.jpg') ?>" style="width: 20px;" alt="">
                                    Indonesia
                                </a>
                            </li>
                            <li>
                                <a href="<?= $english_url; ?>" class="<?= $lang === 'en' ? 'active disabled' : ''; ?>"><img src="<?= base_url('assets/img/logo/english.jpg') ?>" style="width: 20px;" alt="">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>
            <div class="overlay" data-nav-toggler data-overlay></div>

        </div>
    </header>
    <main>
        <?= $this->renderSection('content'); ?>

    </main>


    <!-- 
    - #FOOTER
  -->

    <footer class="footer">
        <div class="container">
            <div class="footer-top section">

                <!-- Brand -->
                <div class="footer-brand">
                    <a href="<?= base_url($lang . '/') ?>" class="logo" style="color: white;">
                        <?= $profil['nama_perusahaan'] ?? 'Flo.do'; ?>
                    </a>
                </div>

                <!-- Tautan Berguna -->
                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title"><?= lang('bahasa.headerLink'); ?></p>
                    </li>
                    <li><a href="<?= base_url($lang . '/' . $homeLink) ?>" class="footer-link"><?= lang('bahasa.Beranda'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $aboutLink) ?>" class="footer-link"><?= lang('bahasa.Tentang'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $articleLink) ?>" class="footer-link"><?= lang('bahasa.Artikel'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $productLink) ?>" class="footer-link"><?= lang('bahasa.Produk'); ?></a></li>
                    <li><a href="<?= base_url($lang . '/' . $contactLink) ?>" class="footer-link"><?= lang('bahasa.Kontak'); ?></a></li>
                </ul>

                <!-- Artikel Kami -->
                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title"><?= lang('bahasa.headerService'); ?></p>
                    </li>
                    <?php if (!empty($kategori_teratas)): ?>
                        <?php foreach ($kategori_teratas as $kategori): ?>
                            <li>
                                <a href="<?= base_url($lang . '/' . $articleLink . '/' . $kategori['slug_kategori_id']) ?>" class="footer-link">
                                    <?= $kategori['nama_kategori_id']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <p class="footer-link">No categories available</p>
                        </li>
                    <?php endif; ?>
                </ul>

                <!-- Sosial Media -->
                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title"><?= lang('bahasa.sosmedLink'); ?></p>
                    </li>
                    <?php if (!empty($sosmed)): ?>
                        <?php foreach ($sosmed as $s): ?>
                            <li>
                                <a href="<?= $s['link_sosmed']; ?>" class="footer-link" target="_blank">
                                    <ion-icon name="logo-<?= strtolower($s['nama_sosmed']); ?>" class="social-icon" aria-hidden="true"></ion-icon>
                                    <?= $s['nama_sosmed']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <p class="footer-link">No social media available</p>
                        </li>
                    <?php endif; ?>
                </ul>

                <!-- Marketplace -->
                <ul class="footer-list">
                    <li>
                        <p class="footer-list-title"><?= lang('bahasa.marketplaceLink'); ?></p>
                    </li>
                    <?php if (!empty($marketplace)): ?>
                        <?php foreach ($marketplace as $m): ?>
                            <li>
                                <a href="<?= $m['link_marketplace']; ?>" class="footer-link" target="_blank">
                                    <img src="<?= base_url('assets/img/logo/' . $m['logo_marketplace']); ?>" alt="<?= $m['nama_marketplace']; ?>" style="width: 20px; height: 20px; margin-right: 5px;">
                                    <?= $m['nama_marketplace']; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li>
                            <p class="footer-link">No marketplace available</p>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">

                <p class="copyright">
                    &copy; 2022 Pixology. All Rights Reserved by codewithsadee
                </p>

                <ul class="footer-bottom-list">

                    <li>
                        <a href="#" class="footer-bottom-link">Terms and conditions</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Privacy policy</a>
                    </li>

                    <li>
                        <a href="#" class="footer-bottom-link">Login / Signup</a>
                    </li>

                </ul>

            </div>
        </div>
    </footer>






    <!-- 
    - #BACK TO TOP
  -->

    <a href="#top" class="back-top-btn has-after active" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up" aria-hidden="true"></ion-icon>
    </a>



    <script
        document.addEventListener('DOMContentLoaded', ()=>
        {
            const navTogglers = document.querySelectorAll('[data-nav-toggler]');
            const navbar = document.querySelector('[data-navbar]');
            const overlay = document.querySelector('[data-overlay]');

            const toggleNavbar = () => {
                navbar.classList.toggle('active');
                overlay.classList.toggle('active');
                document.body.classList.toggle('nav-active');
            };

            navTogglers.forEach(toggler => {
                toggler.addEventListener('click', toggleNavbar);
            });

            const navLinks = document.querySelectorAll('[data-nav-link]');

            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbar.classList.contains('active')) {
                        toggleNavbar();
                    }
                });
            });

            // Tambahkan fungsionalitas untuk dropdown mobile
            const dropdownTogglers = document.querySelectorAll('.dropdown-toggle');
            dropdownTogglers.forEach(toggler => {
                toggler.addEventListener('click', (e) => {
                    e.preventDefault();
                    const parentItem = toggler.closest('.navbar-item.dropdown');
                    parentItem.classList.toggle('active');
                });
            });
        };
    </script>

    <!-- 
    - custom js link
  -->
    <script src="./assets/js/script.js" defer></script>

    <!-- 
    - ionicon link
  -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        let slides = document.querySelectorAll('.slide');
        let current = 0;

        setInterval(() => {
            slides[current].classList.remove('active');
            current = (current + 1) % slides.length;
            slides[current].classList.add('active');
        }, 3000); // ganti slide tiap 3 detik
    </script>
    <script>
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 50) {
                header.classList.add('active');
            } else {
                header.classList.remove('active');
            }
        });
    </script>

</body>

</html>