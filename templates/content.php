<article <?php post_class(); ?>>
  <header>
    <?php get_template_part('templates/entry-meta'); ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
    <?php if ( has_post_thumbnail() ) : ?>
      <a class="zoom" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
    <?php endif; ?>
    <?php the_excerpt(); ?>
  </div>
</article>
