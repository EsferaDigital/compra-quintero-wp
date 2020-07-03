<?php

// Para modificar el extracto
if(!function_exists('qtr_excerpt_more')):
  function qtr_excerpt_more() {
    return '<a href="' . get_permalink() . '">' . __(' leer más', 'qtr') . '<i class="fab fa-readme"></i></a>';
  }
endif;
add_filter( 'excerpt_more', 'qtr_excerpt_more' );

if(!function_exists('qtr_excerpt_length')):
  function qtr_excerpt_length() {
    return 40;
  }
endif;
add_filter( 'excerpt_length', 'qtr_excerpt_length' );
