<?php
get_header();
get_template_part("template-parts/content/content-hero");
?>

<div class="flex justify-center">
  <div class="container px-10 max-w-4xl">
    <article class="content" id="post-<?php the_ID(); ?>">
      <?php the_content(); ?>

      <div id="slider"></div>
      <div id="refs"></div>
    </article>
  </div>
</div>

<?php
get_footer();
?>
