</div> <!-- cierre container central -->
  <footer class="Footer">
    <section class="Footer-container">
      <div class="Footer-widgets">
        <?php get_template_part('template-parts/footer-widgets'); ?>
      </div>
      <div class="Card-copy">
        <p class="Small-text">Copyright &copy; <?php echo date('Y');?> Compra en Quintero</p>
        <p class="Small-text">Todos los derechos reservados.</p>
      </div>
    </section>
    <div class="Box-creditos">
      <p class="Small-text">Desarrollado por<a class="Link-text-creditos" href="https://esferadigital.cl" target="_blank"> esferadigital.cl</a></p>
    </div>
    <button id="ButtonTop">Subir</button>
  </footer>
  <?php wp_footer();?>
</body>
</html>
