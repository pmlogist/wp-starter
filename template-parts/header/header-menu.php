<?php if (has_nav_menu('primary')) : ?>
  <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-end">
    <div class="hidden sm:ml-6 sm:block">
      <div class="flex space-x-4">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'container_class' => 'flex',
            'items_wrap' => '<ul  class="flex text-slate-400 pl-3 py-2 text-sm font-medium %2$s">%3$s</ul>',
            'add_li_class'  => 'font-bold mx-2 hover:text-slate-800',
            'fallback_cb' => false,
          )
        );
        ?>
      </div>
    </div>
  </div>
<?php endif; ?>
