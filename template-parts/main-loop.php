<main class="Main">
  <section class="Main-container">
  <article class="Widget">
    <h3 class="Widget-title"><?php _e('Blog','qtr');?></h3>
    <?php get_search_form(); ?>
  </article>
  <section class="Entradas">
    <?php
      if(have_posts()):
        while(have_posts()):
          the_post();
          get_template_part('template-parts/home-content');
        endwhile;
    ?>
  </section>
    <?php
        get_template_part('template-parts/pagination');
      else:
        get_template_part('template-parts/not-found');
      endif;
    ?>
  </section>
</main>
