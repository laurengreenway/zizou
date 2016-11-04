<?php get_header();  ?>

<div class="main">
  <div class="container">
    <section class="latest-posts content grid">
        <div class="grid-cell">
          <h2><?php the_field('home_latest_stories'); ?></h2>
          <p><?php the_field('home_description'); ?></p>
          <button class="btn"></button><?php the_field('home_view_more') ?>
        </div>
      <?php 
        $postLoop = new WP_Query(array(
          'post_type' => 'post',
          'offset' => 1,
          'posts_per_page' => 3
        ));
        if($postLoop->have_posts()) while($postLoop->have_posts()): $postLoop->the_post()
      ?>
        <div class="grid-cell">
        <?php  ?>
          <p><?php the_author(); ?></p>
          <p><?php the_time('F j, Y'); ?></p>
          <p><?php the_tags(); ?></p>
          <?php the_title() ?> 
          <?php the_post_thumbnail('medium') ?>
        </div>
    <?php endwhile;?>
    <?php wp_reset_postdata(); ?>
    </section> <!-- /,content -->
    <section class="quote content">
      <h4><?php the_field('home_quote_tagline'); ?></h4>
      <h2><?php the_field('home_quote'); ?></h2>
      <p><?php the_field('home_quote_explained'); ?></p>
    </section>
    <section class="insta">
      <?php echo wdi_feed(array('id'=>'1')); ?>
    </section>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>