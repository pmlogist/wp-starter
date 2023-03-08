<?php
get_header();
?>

<div class="flex justify-center pt-16">
  <article id="post-<?php the_ID(); ?>">
    <div id="content" class="container px-10 max-w-4xl">
      <?php the_content(); ?>
    </div>
  </article>
</div>

<?php
get_footer();
?>


