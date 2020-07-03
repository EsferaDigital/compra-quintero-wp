<?php get_header(); the_post(); ?>
<main class="Main">
  <section class="Main-container">
    <section class="Entrada">
      <?php the_post_thumbnail(); ?>
      <h2><?php the_title(); ?></h2>
      <div class="PostData">
        <p>Por: <?php the_author_posts_link(); ?></p>
        <?php the_time(get_option('date_format')); ?>
      </div>
      <article class="Content">
        <?php the_content(); ?>
      </article>
    </section>
  </section>
</main>
<?php
get_footer();
?>
