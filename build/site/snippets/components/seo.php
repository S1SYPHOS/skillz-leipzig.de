<!-- SEO -->
<?= seo('title') ?>
<?= seo('description') ?>
<link rel="canonical" href="<?= $page->url() ?>">

<!-- Facebook -->
<meta property="og:locale" content="<?= $site->language()->locale() ?>">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= seo('title', array(), true); ?>">
<meta property="og:description" content="<?= seo('description', array(), true); ?>">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:site_name" content="<?= $site->title()->html() ?>">

<!-- Twitter -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= seo('title', array(), true); ?>">
