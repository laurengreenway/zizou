<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link href="https://fonts.googleapis.com/css?family=Hind|Montserrat|Playfair+Display" rel="stylesheet">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <link href='http://cdn.jsdelivr.net/devicons/1.8.0/css/devicons.min.css' rel='stylesheet'>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >

<header>
 
    <?php if ( is_front_page() ) { ?>
    <nav class="home grid">
      <div class="container grid-cell">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'social'
        )); ?>
        <h1>
          <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
            <?php bloginfo( 'name' ); ?>
          </a>
        </h1>

        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </div>
    </nav>

        <?php // WP_Query arguments
          $args = array (
            'nopaging'               => false,
            'posts_per_page'         => '1',
            'ignore_sticky_posts'    => true,
            'offset'                 => '0',
          );

          // The Query
          $homePagePosts = new WP_Query( $args );

          // The Loop
          if ( $homePagePosts->have_posts() ) {
            while ( $homePagePosts->have_posts() ) {

              $homePagePosts->the_post();
              ?>
              <div class="hero grid" style="background-image: url(<?php echo the_post_thumbnail_url('large'); ?>)">
                <div class="hero-container">
                  <h1><?php  the_title() ?></h1>
                  <?php $content = get_the_content(); ?>
                  <p><?php echo wp_trim_words($content, 20); ?></p>
                  <a href="<?php echo get_post_permalink(); ?>"><button class="btn">View More</button></a>
              <?
            }
          } else {
            // no posts found
          }

          // Restore original Post Data
          wp_reset_postdata(); ?>
      </div>

    </div> 
    <?php
    }
    else { ?>
      <nav class="main">
        <div class="container grid">
          <h1>
            <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
              <?php bloginfo( 'name' ); ?>
            </a>
          </h1>

          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'primary'
          )); ?>
        </div>
      </nav>
    <?php
    }
 ?>
</header><!--/.header-->

