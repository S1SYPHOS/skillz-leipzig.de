<?php
  // if ($page->banner()->isNotEmpty()) { $banner = $page->banner()->toFile(); } else {
  $banner = (new Asset('/assets/images/skillz-banner.jpg'));
  // }
?>

<!-- SEO -->
<title><?php if($page->isHomePage()) : ?><?= seo('title', array(), true); ?><?php else : ?><?= seo('title', array(), true); ?> | <?= $site->title()->html() ?><?php endif ?></title>
<?= seo('description'); ?>
<link rel="canonical" href="<?= $page->url() ?>">
<meta name="generator" content="Kirby CMS">

<!-- Facebook -->
<meta property="og:locale" content="<?= $site->language()->locale() ?>">
<meta property="og:title" content="<?php if($page->isHomePage()) : ?><?= seo('title', array(), true); ?><?php else : ?><?= seo('title', array(), true); ?> | <?= $site->title()->html() ?><?php endif ?>">
<meta property="og:description" content="<?= seo('description', array(), true); ?>">
<meta property="og:url" content="<?= $page->url() ?>">
<meta property="og:image" content="<?= $banner->url() ?>">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:title" content="<?php if($page->isHomePage()) : ?><?= seo('title', array(), true); ?><?php else : ?><?= seo('title', array(), true); ?> | <?= $site->title()->html() ?><?php endif ?>">
<meta property="twitter:site" content="<?= $page->url() ?>">
<meta property="twitter:description" content="<?= seo('description', array(), true); ?>">
<meta property="twitter:image" content="<?= $banner->url() ?>">
