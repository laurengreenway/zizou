<?php get_header();  ?>

<div class="hero">
  <div class="container">
    <?php // WP_Query arguments
      $args = array (
        'nopaging'               => false,
        'posts_per_page'         => '5',
        'ignore_sticky_posts'    => true,
        'offset'                 => '0',
      );

      // The Query
      $homePagePosts = new WP_Query( $args );

      // The Loop
      if ( $homePagePosts->have_posts() ) {
        while ( $homePagePosts->have_posts() ) {
          $homePagePosts->the_post();
          // do something
          '<h1>' . the_title() . '</h1>';
          the_content();
        }
      } else {
        // no posts found
      }

      // Restore original Post Data
      wp_reset_postdata(); ?>
  </div>

</div> 

<div class="main">
  <div class="container">

    <div class="content">
      <?php the_title(); ?>
      <?php the_field('home_latest_stories'); ?>
      <?php the_field('home_description'); ?>
      <?php the_field('home_view_more') ?>

      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

    

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>