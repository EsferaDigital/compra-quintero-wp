<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_uno')):
    dynamic_sidebar('footer_uno');
  else:
  ?>
  <article class="Widget">
    <h3>Contenido personalizado</h3>
  </article>
  <?php endif; ?>
</div>
<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_dos')):
    dynamic_sidebar('footer_dos');
  else:
  ?>
  <article class="Widget">
    <h3>Contenido personalizado</h3>
  </article>
  <?php endif; ?>
</div>
<div class="Footer-widgets-item">
  <?php
  if(is_active_sidebar('footer_tres')):
    dynamic_sidebar('footer_tres');
  else:
  ?>
  <article class="Widget">
    <h3>Contenido personalizado</h3>
  </article>
  <?php endif; ?>
</div>
