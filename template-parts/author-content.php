<aside class="Author-info">
  <div>
    <h3><?php _e('Información del Autor:', 'qtr'); ?></h3>
    <?php echo get_avatar(get_the_author_meta('ID'), 500); ?>
  </div>
  <ul>
    <li>
      <?php _e('Usuario: ', 'qtr'); the_author(); ?>
    </li>
    <li>
      <?php _e('Nombre: ', 'qtr'); echo get_the_author_meta('first_name') . ' ' . get_the_author_meta('last_name'); ?>
    </li>
    <li>
      <?php _e('Correo: ', 'qtr'); echo get_the_author_meta('user_email'); ?>
    </li>
    <li>
      <?php _e('Url: ', 'qtr'); ?>
      <a href="<?php echo get_the_author_meta('user_url'); ?>" target="_blank">
        <?php echo get_the_author_meta('user_url'); ?>
      </a>
    </li>
    <li>
      <?php _e('Fecha de registro: ', 'qtr'); echo get_the_author_meta('user_registered'); ?>
    </li>
    <li>
      <?php _e('Rol del usuario: ', 'qtr'); echo get_the_author_meta('roles')[0]; ?>
    </li>
    <li>
      <?php _e('Descripción: ', 'qtr'); echo get_the_author_meta('description'); ?>
    </li>
    <li>
      <?php _e('Número de publicaciones: ', 'qtr'); echo get_the_author_posts(); ?>
    </li>
  </ul>
</aside>
