  <div id="primary-menu" class="fixed top-0 z-40 w-full backdrop-blur-lg transition-colors duration-300 border-b border-b-transparent">
    <div class="relative flex h-16 items-center justify-between mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 z-10">

      <?php get_template_part("template-parts/header/header-brand") ?>
      <?php get_template_part("template-parts/header/header-menu") ?>

      <div class="flex items-center px-6 gap-3 text-xl text-slate-400">
        <div id="appereance-button" class="hover:text-slate-800">
          <i class="ti ti-moon"></i>
        </div>
        <div id="search-button" class="hover:text-slate-800"></div> <!-- SearchButton.vue -->
        <div id="mobile-button" class="hover:text-slate-800 sm:hidden"></div> <!-- MobileButton.vue -->
      </div>
    </div>
  </div>

  <div id="search-overlay" class="invisible fixed z-40 inset-0 flex items-start justify-center pt-16 sm:pt-24" role="dialog" aria-modal="true" data-open="false"></div>
  <!-- <div id="mobile-overlay" class="invisible fixed z-30 h-full w-full bg-white pt-16"></div> -->
  <?php get_template_part("template-parts/header/header-menu-mobile") ?>
